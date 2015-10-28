<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/25/2015
 * Time: 9:54 PM
 */
class Setting_model extends CI_Model
{
    private $table = "settings";
    private $pk = "id";

    public function __construct()
    {
        parent::__construct();
    }

    public function read($id = null)
    {
        if ($id == null) {
            $result = $this->db->get($this->table);
            $data = $result->result_array();
            $settings = array();
            foreach ($data as $setting) {
                $settings[$setting["key"]] = $setting["value"];
            }
            return $settings;
        } else {
            $result = $this->db->get_where($this->table, array($this->pk => $id));
            return $result->row_array();
        }
    }

    public function update($data)
    {
        $status = array();

        if ($data["favicon"] == null) {
            unset($data["favicon"]);
        } else {
            $config = array(
                'allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => "./assets/global/images",
                'max_size' => 512,
                'max_width' => '256',
                'max_height' => '256',
                'file_name' => "favicon",
                'overwrite' => true
            );
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('favicon'))
            {
                $status["upload"] = false;
                $status["message"] = $this->upload->display_errors();
                return $status;
            }
            else
            {
                $data["favicon"] = $this->upload->data()["file_name"];
                $status["upload"] = true;
            }
        }

        $this->db->trans_start();

        foreach ($data as $setting => $value) {
            $this->db->where("key", $setting);
            $this->db->update($this->table, array(
                    "value" => $value,
                    "user_id" => $this->session->userdata(User_model::$SESSION_ID))
            );
        }

        $this->db->trans_complete();

        $status["query"] = $this->db->trans_status();

        return $status;
    }

}