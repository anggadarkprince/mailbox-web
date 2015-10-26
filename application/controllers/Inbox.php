<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/25/2015
 * Time: 11:25 AM
 */
class Inbox extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Inbox_model", "inbox_model");
        $this->load->model("User_model", "user_model");
        if(!User_model::is_authorize(User_model::$TYPE_ADM) && !User_model::is_authorize(User_model::$TYPE_DEV))
        {
            redirect("login");
        }
    }

    public function index()
    {
        $data = [
            'title' => "Inbox",
            'page' => "inbox/inbox",
            'inbox' => $this->inbox_model->read()
        ];
        $this->load->view('templates/template', $data);
    }

    public function create()
    {
        $data = [
            'title' => "Create In-mail",
            'page' => "inbox/create",
        ];
        $this->load->view('templates/template', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'title' => "Edit In-mail",
            'page' => "inbox/edit",
        ];
        $this->load->view('templates/template', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title' => "Detail In-mail",
            'page' => "inbox/show",
        ];
        $this->load->view('templates/template', $data);
    }
}