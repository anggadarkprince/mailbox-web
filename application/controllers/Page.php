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

        $this->load->model("User_model","user_model");
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
        $data = ['title' => "Lockscreen"];
        $this->load->view('pages/lockscreen', $data);
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
        $this->load->model("Archive_model","archive_model");
        $data = [
            'title' => "Archive",
            'page' => "mails/archive",
            'archive' => $this->archive_model->archive(),
        ];
        $this->load->view('templates/template', $data);
    }
}