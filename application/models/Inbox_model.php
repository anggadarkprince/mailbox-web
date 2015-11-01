<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/25/2015
 * Time: 9:52 PM
 */
class Inbox_model extends CI_Model
{
    private $table = "inbox";
    private $pk = "id";

    public function __construct()
    {
        parent::__construct();
    }

    public function upload_batch_attachment($file, $id, $type)
    {
        $status = true;
        $query = true;
        $message = "";

        $this->load->library('upload');
        $files = $_FILES;
        $total = count($_FILES[$file]['name']);
        for($i = 0; $i < $total; $i++)
        {
            $_FILES[$file]['name'] = $files[$file]['name'][$i];
            $_FILES[$file]['type'] = $files[$file]['type'][$i];
            $_FILES[$file]['tmp_name'] = $files[$file]['tmp_name'][$i];
            $_FILES[$file]['error'] = $files[$file]['error'][$i];
            $_FILES[$file]['size'] = $files[$file]['size'][$i];

            if($_FILES[$file]['name'] != null){
                $this->upload->initialize($this->set_upload_options(date("Y-m-d")."_".$type.'_'.$_FILES[$file]['name']));
                if(!$this->upload->do_upload($file)){
                    $status = false;
                    $message .= '<strong>'.$_FILES[$file]['name'].'</strong> '.$this->upload->display_errors();
                }
                else{
                    $data = [
                        'inbox_id' => $id,
                        'resource' => $this->upload->data()["file_name"],
                        'type' => $type
                    ];
                    $result = $this->db->insert('inbox_attachment', $data);
                    if(!$result){
                        $query = false;
                    }
                }
            }
        }

        return ["upload" => $status, "query" => $query, "message" => $message];
    }

    private function set_upload_options($filename)
    {
        $config = array(
            'allowed_types' => '*',
            'upload_path' => "./assets/global/file",
            'max_size' => 20000,
            'file_name' => $filename,
            'overwrite' => false
        );
        return $config;
    }

    public function next_agenda()
    {
        $result = $this->db->query("SELECT IFNULL(MAX(id), 0)+1 AS no FROM inbox")->row_array();
        return $result["no"];
    }

    public function create($mail)
    {
        $status = array();

        $inbox = $this->db->insert($this->table, $mail);
        if($inbox){
            $original = $this->upload_batch_attachment('attachment-original', $this->db->insert_id(), 'ORIGINAL');
            if(!$original['upload'] || !$original['query']){
                return $original;
            }
            $signature = $this->upload_batch_attachment('attachment-signature', $this->db->insert_id(), 'SIGNATURE');
            if(!$signature['upload'] || !$signature['query']){
                return $original;
            }
        }

        $status["query"] = $inbox;
        $status["upload"] = true;
        $status["message"] = "Attachment successfully uploaded";

        return $status;
    }

    public function read($id = null)
    {
        if ($id == null) {
            $result = $this->db
                ->select("inbox.*, labels.label")
                ->from($this->table)
                ->join("labels", "label_id = labels.id")
                ->order_by('mail_date', 'DESC')
                ->get();
            return $result->result_array();
        } else {
            $result = $this->db
                ->select("inbox.*, labels.label")
                ->from($this->table)
                ->join("labels", "label_id = labels.id")
                ->where($this->table.".".$this->pk, $id)
                ->get();
            return $result->row_array();
        }
    }

    public function read_attachment($mail, $type)
    {
        $result = $this->db->get_where('inbox_attachment', ['inbox_id' => $mail, 'type' => $type]);
        return $result->result_array();
    }

    public function update($mail, $id)
    {
        $status = array();

        if ($mail["attachment"] == null) {
            unset($mail["attachment"]);
        } else {
            $config = array(
                'allowed_types' => '*',
                'upload_path' => "./assets/global/file",
                'max_size' => 10000,
                'file_name' => date("Y-m-y")."_".$mail["attachment"],
                'overwrite' => false
            );
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('attachment'))
            {
                $status["upload"] = false;
                $status["query"] = false;
                $status["message"] = $this->upload->display_errors();
                return $status;
            }
            else
            {
                $mail["attachment"] = $this->upload->data()["file_name"];
                $status["upload"] = true;
                $status["message"] = "Attachment successfully uploaded";
            }
        }

        $this->db->where($this->pk, $id);
        $status["query"] = $this->db->update($this->table, $mail);
        return $status;
    }

    public function delete($id)
    {
        $attachment = $this->db->get_where('inbox_attachment', ['inbox_id' => $id])->result_array();

        $condition = array($this->pk => $id);
        $delete = $this->db->delete($this->table, $condition);
        if($delete){
            foreach($attachment as $data):
                echo $data["resource"];
                $upload = "./assets/global/file/".$data["resource"];
                if(file_exists($upload)){
                    unlink($upload);
                }
            endforeach;
        }

        return $delete;
    }

}