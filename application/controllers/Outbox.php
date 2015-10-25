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
    }

    public function index()
    {
        $data = [
            'title' => "Outbox",
            'page' => "outbox/outbox",
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
        ];
        $this->load->view('templates/template', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title' => "Detail Out-mail",
            'page' => "outbox/show",
        ];
        $this->load->view('templates/template', $data);
    }
}