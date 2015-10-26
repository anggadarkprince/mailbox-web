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
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'max_length[50]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_username_exists|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[120]|min_length[6]');
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE)
        {
            $data = [
                "operation" => "warning",
                "message" => validation_errors()
            ];
        }
        else
        {
            $firstname   = $this->input->post("firstname");
            $lastname   = $this->input->post("lastname");

            $user = [
                "name" => ($lastname != "") ? $firstname." ".$lastname : $firstname,
                "username" => $this->input->post("username"),
                "email" => $this->input->post("email"),
                "password" => md5($this->input->post("password")),
            ];

            $result = $this->user_model->register($user);

            if($result)
            {
                $this->session->set_flashdata("operation", "success");
                $this->session->set_flashdata("message", "You've successfully registered");
                redirect("login");
                return;
            }
            else{
                $data = [
                    "operation" => "danger",
                    "message" => "Something is getting wrong"
                ];
            }
        }
        $data['title'] = "Register";
        $this->load->view('pages/register', $data);
    }

    public function username_exists($username)
    {
        if($this->user_model->check_existing_username($username)){
            return true;
        }
        else{
            $this->form_validation->set_message('username_exists', 'Username %s has been registered');
            return false;
        }
    }

    public function forgot_password()
    {
        // TODO
    }

}