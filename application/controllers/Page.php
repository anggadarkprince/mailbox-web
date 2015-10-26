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
        $this->view('login');
    }

    public function view($page = 'login')
    {
        if (!file_exists(APPPATH . '/views/pages/' . $page . '.php')) {
            show_404();
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
        $data = ['title' => "Login"];
        $this->load->view('pages/login', $data);
    }

    public function register()
    {
        $data = ['title' => "Register"];
        $this->load->view('pages/register', $data);
    }

    public function logout()
    {

    }

    public function archive()
    {
        $data = [
            'title' => "Archive",
            'page' => "mails/archive",
        ];
        $this->load->view('templates/template', $data);
    }
}