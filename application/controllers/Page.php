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
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            show_404();
        }

        $data['title'] = ucfirst($page);
        $data['page'] = $page;

        $this->load->view('templates/template', $data);
    }

}