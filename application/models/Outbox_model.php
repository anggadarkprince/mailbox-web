<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/25/2015
 * Time: 9:54 PM
 */
class Outbox_model extends CI_Model
{
    private $table = "outbox";
    private $pk = "id";

    public function __construct()
    {
        parent::__construct();
    }

    public function next_id()
    {
        $result = $this->db->query("SELECT IFNULL(MAX(id), 0)+1 AS id FROM outbox")->row_array();
        return $result["id"];
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
                ->select("outbox.*, labels.label, labels.description")
                ->from($this->table)
                ->join("labels", "label_id = labels.id")
                ->order_by('mail_date', 'DESC')
                ->get();
            return $result->result_array();
        } else {
            $result = $this->db
                ->select("outbox.*, labels.label, labels.description")
                ->from($this->table)
                ->join("labels", "label_id = labels.id")
                ->where($this->table.".".$this->pk, $id)
                ->get();
            return $result->row_array();
        }
    }

}