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
        $result = $this->db->query("SELECT IFNULL(MAX(id), 0)+1 AS id FROM inbox")->row_array();
        return $result["id"];
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