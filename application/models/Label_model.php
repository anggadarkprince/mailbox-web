<?php
/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/27/2015
 * Time: 8:12 AM
 */
class Label_model extends CI_Model
{
    private $table = "labels";
    private $pk = "id";

    public function __construct()
    {
        parent::__construct();
    }

    public function create($label)
    {
        return $this->db->insert($this->table, $label);
    }

    public function read($id = null)
    {
        if ($id == null) {
            $result = $this->db
                ->select("*")
                ->from($this->table)
                ->get();
            return $result->result_array();
        } else {
            $result = $this->db
                ->select("*")
                ->from($this->table)
                ->get();
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