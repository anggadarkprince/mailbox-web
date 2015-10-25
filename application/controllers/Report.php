<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/25/2015
 * Time: 11:25 AM
 */
class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'title' => "Report",
            'page' => "inbox/inbox",
        ];
        $this->load->view('templates/template', $data);
    }

}