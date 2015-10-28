<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/23/2015
 * Time: 1:48 PM
 */
class Page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("User_model","user_model");
    }

    public function index()
    {
        redirect("login");
    }

    public function view($page = 'login')
    {
        if (!file_exists(APPPATH . '/views/pages/' . $page . '.php')) {
            show_404();
        }

        if(!User_model::is_authorize(User_model::$TYPE_ADM) && !User_model::is_authorize(User_model::$TYPE_DEV))
        {
            redirect("login");
        }

        $data = [
            'title' => ucfirst($page),
            'page' => "pages/".$page,
        ];
        $this->load->view('templates/template', $data);
    }

    public function lockscreen()
    {
        $this->session->set_userdata(User_model::$SESSION_LOCK, true);
        $data = ['title' => "Lockscreen"];
        $this->load->view('pages/lockscreen', $data);
    }

    public function unlock()
    {
        $username = $this->session->userdata(User_model::$SESSION_USERNAME);
        $password = $this->input->post("password");
        $this->load->model("User_model","user_model");
        if($this->user_model->authentication($username, $password)){
            $this->session->unset_userdata(User_model::$SESSION_LOCK);
            redirect("dashboard");
        }
        else{
            $this->session->set_flashdata("operation", "warning");
            $this->session->set_flashdata("message", "<strong>Password</strong> mismatch with ".$username." account");
            redirect("lockscreen");
        }
    }

    public function login()
    {
        $this->load->model("User_model","user_model");
        if(User_model::is_authorize(User_model::$TYPE_ADM) || User_model::is_authorize(User_model::$TYPE_DEV))
        {
            redirect("dashboard");
        }
        else{
            $data = ['title' => "Login"];
            $this->load->view('pages/login', $data);
        }
    }

    public function dashboard()
    {
        if($this->session->userdata(User_model::$SESSION_LOCK) != null){
            redirect("lockscreen");
        }
        $this->load->model("User_model","user_model");
        if(!User_model::is_authorize(User_model::$TYPE_ADM) && !User_model::is_authorize(User_model::$TYPE_DEV))
        {
            redirect("login");
        }
        else{
            $data = ['title' => "Dashboard", "page" => "pages/dashboard"];
            $this->load->view('templates/template', $data);
        }
    }

    public function register()
    {
        $this->load->model("User_model","user_model");
        if(User_model::is_authorize(User_model::$TYPE_ADM) || User_model::is_authorize(User_model::$TYPE_DEV))
        {
            redirect("dashboard");
        }
        else{
            $data = ['title' => "Register"];
            $this->load->view('pages/register', $data);
        }
    }

    public function logout()
    {
        $this->load->model("User_model","user_model");
        $this->user_model->destroy();
        redirect(base_url());
    }

    public function archive()
    {
        if($this->session->userdata(User_model::$SESSION_LOCK) != null){
            redirect("lockscreen");
        }
        $this->load->model("Archive_model","archive_model");
        $data = [
            'title' => "Archive",
            'page' => "mails/archive",
            'archive' => $this->archive_model->archive(),
        ];
        $this->load->view('templates/template', $data);
    }
}