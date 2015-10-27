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

    public function next_agenda()
    {
        $result = $this->db->query("SELECT IFNULL(MAX(id), 0)+1 AS no FROM inbox")->row_array();
        return $result["no"];
    }

    public function create($mail)
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

        $status["query"] = $this->db->insert($this->table, $mail);
        return $status;
    }

    public function read($id = null)
    {
        if ($id == null) {
            $result = $this->db
                ->select("inbox.*, labels.label, labels.description")
                ->from($this->table)
                ->join("labels", "label_id = labels.id")
                ->order_by('mail_date', 'DESC')
                ->get();
            return $result->result_array();
        } else {
            $result = $this->db
                ->select("inbox.*, labels.label, labels.description")
                ->from($this->table)
                ->join("labels", "label_id = labels.id")
                ->where($this->table.".".$this->pk, $id)
                ->get();
            return $result->row_array();
        }
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
        $condition = array($this->pk => $id);
        return $this->db->delete($this->table, $condition);
    }

}