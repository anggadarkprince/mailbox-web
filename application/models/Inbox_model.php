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

    public function read($id = null)
    {
        if ($id == null) {
            $result = $this->db
                ->select("*")
                ->from($this->table)
                ->join("labels", "label_id = labels.id")
                ->order_by('mail_date', 'DESC')
                ->get();
            return $result->result_array();
        } else {
            $result = $this->db
                ->select("*")
                ->from($this->table)
                ->join("labels", "label_id = labels.id")
                ->where($this->pk, $id);
            return $result->row_array();
        }
    }

    public function update($data, $id)
    {
        $this->db->where($this->pk, $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $condition = array($this->pk => $id);
        return $this->db->delete($this->table, $condition);
    }

}