<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/26/2015
 * Time: 10:39 AM
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("User_model","user_model");
    }

    public function auth()
    {
        $this->form_validation->set_rules('username', 'Username/Email', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');

        if ($this->form_validation->run() == FALSE)
        {
            $data = [
                "operation" => "warning",
                "message" => validation_errors()
            ];
        }
        else
        {
            $username   = $this->input->post("username");
            $password   = $this->input->post("password");

            $result = $this->user_model->authentication($username, $password);

            if($result)
            {
                redirect("dashboard");
                return;
            }
            else{
                $data = [
                    "operation" => "danger",
                    "message" => "Username or Password Mismatch",
                ];
            }
        }

        $data['title'] = "Login";
        $this->load->view('pages/login', $data);
    }

    public function register()
    {

    }

    public function forgot_password()
    {
        // TODO
    }

}