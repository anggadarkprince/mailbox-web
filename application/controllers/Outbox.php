<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/25/2015
 * Time: 11:25 AM
 */
class Outbox extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Outbox_model", "outbox_model");
        $this->load->model("User_model", "user_model");
        if(!User_model::is_authorize(User_model::$TYPE_ADM) && !User_model::is_authorize(User_model::$TYPE_DEV))
        {
            redirect("login");
        }
    }

    public function index()
    {
        $data = [
            'title' => "Outbox",
            'page' => "outbox/outbox",
            'inbox' => $this->outbox_model->read()
        ];
        $this->load->view('templates/template', $data);
    }

    public function create()
    {
        $data = [
            'title' => "Create Out-mail",
            'page' => "outbox/create",
        ];
        $this->load->view('templates/template', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'title' => "Edit Out-mail",
            'page' => "outbox/edit",
            'mail' => $this->outbox_model->read($id),
        ];
        $this->load->view('templates/template', $data);
    }

    public function update()
    {

    }

    public function show($id = null)
    {
        $data = [
            'title' => "Detail Out-mail",
            'page' => "outbox/show",
            'mail' => $this->outbox_model->read($id),
        ];
        $this->load->view('templates/template', $data);
    }

    public function delete($id)
    {
        $result = $this->inbox_model->delete($id);
        if($result){
            $this->session->set_flashdata("operation", "warning");
            $this->session->set_flashdata("message", "Out-mail successfully deleted");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "Something is getting wrong");
        }
        redirect("inbox");
    }
}