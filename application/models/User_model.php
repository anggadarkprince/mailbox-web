<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/25/2015
 * Time: 9:53 PM
 */
class User_model extends CI_Model
{
    private $table = "users";
    private $pk = "id";

    public static $TYPE_DEV = "DEV";
    public static $TYPE_ADM = "ADMIN";

    public static $SESSION_ID = "mail-id";
    public static $SESSION_USERNAME = "mail-username";
    public static $SESSION_NAME = "mail-name";
    public static $SESSION_AVATAR = "mail-avatar";
    public static $SESSION_ROLE = "mail-role";

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
                ->get();
            return $result->result_array();
        } else {
            $result = $this->db->get_where($this->table, ['id' => $id]);
            return $result->row_array();
        }
    }

    public static function is_authorize($authority)
    {
        $CI = get_instance();
        if ($CI->session->userdata(User_model::$SESSION_ROLE) == $authority) {
            return true;
        }
        return false;
    }

    public function authentication($username, $password)
    {
        $user = $this->db->get_where($this->table, array("username" => $username, "password" => md5($password)));
        if ($user->num_rows() > 0) {
            $result = $user->row_array();

            $this->session->set_userdata(User_model::$SESSION_ROLE, $result["authority"]);
            $this->session->set_userdata(User_model::$SESSION_ID, $result["id"]);
            $this->session->set_userdata(User_model::$SESSION_USERNAME, $result["username"]);
            $this->session->set_userdata(User_model::$SESSION_NAME, $result["name"]);
            $this->session->set_userdata(User_model::$SESSION_AVATAR, $result["avatar"]);

            return true;
        }

        return false;
    }

    public function destroy()
    {
        $this->session->unset_userdata(User_model::$SESSION_ROLE);
        $this->session->unset_userdata(User_model::$SESSION_USERNAME);
        $this->session->unset_userdata(User_model::$SESSION_ID);
        $this->session->unset_userdata(User_model::$SESSION_AVATAR);
        $this->session->unset_userdata(User_model::$SESSION_NAME);
    }

    public function check_existing_username($username)
    {
        $user = $this->db->get_where($this->table, array("username" => $username));
        if ($user->num_rows() > 0) {
            return false;
        }
        return true;
    }

    public function register($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($data, $id)
    {
        $status = array();

        if ($data["avatar"] == null) {
            unset($data["avatar"]);
        } else {
            $config = array(
                'allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => "./assets/global/images/avatars",
                'max_size' => 2000,
                'max_width' => '1000',
                'max_height' => '1000',
            );
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('avatar'))
            {
                $status["upload"] = false;
                $status["query"] = false;
                $status["message"] = $this->upload->display_errors();
                return $status;
            }
            else
            {
                $data["avatar"] = $this->upload->data()["file_name"];
                $this->session->set_userdata(User_model::$SESSION_AVATAR, $data["avatar"]);
                $status["upload"] = true;
                $status["message"] = "Avatar successfully uploaded";
            }
        }

        $this->db->where($this->pk, $id);
        $status["query"] = $this->db->update($this->table, $data);

        if($status["query"]){
            $this->session->set_userdata(User_model::$SESSION_NAME, $data["name"]);
        }

        return $status;
    }
}