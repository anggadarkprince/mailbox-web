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

    public static function is_authorize($authority)
    {
        $CI = get_instance();
        if($CI->session->userdata(User_model::$SESSION_ROLE) == $authority){
            return true;
        }
        return false;
    }

    public function authentication($username, $password)
    {
        $user = $this->db->get_where($this->table, array("username" => $username, "password" => md5($password)));
        if($user->num_rows() > 0)
        {
            $result = $user->row_array();

            $this->session->set_userdata(User_model::$SESSION_ROLE, $result["authority"]);
            $this->session->set_userdata(User_model::$SESSION_ID, $result["id"]);
            $this->session->set_userdata(User_model::$SESSION_USERNAME,$result["username"]);
            $this->session->set_userdata(User_model::$SESSION_NAME,$result["name"]);
            $this->session->set_userdata(User_model::$SESSION_AVATAR,$result["avatar"]);

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
        if($user->num_rows() > 0)
        {
            return false;
        }
        return true;
    }

    public function register($data)
    {
        return $this->db->insert($this->table, $data);
    }
}