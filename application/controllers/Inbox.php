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
        $this->load->model("Label_model", "label_model");
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
            'inbox' => $this->inbox_model->read(),
        ];
        $this->load->view('templates/template', $data);
    }

    public function create()
    {
        if($this->input->server('REQUEST_METHOD') == "POST")
        {
            $this->form_validation->set_rules('no_agenda', 'No Agenda', 'trim|required');
            $this->form_validation->set_rules('no_mail', 'No Surat', 'trim|required');
            $this->form_validation->set_rules('subject', 'Perihal', 'trim|required|max_length[300]');
            $this->form_validation->set_rules('signature', 'Disposisi', 'min_length[0]');
            $this->form_validation->set_rules('receiver', 'Tujuan', 'trim|required|max_length[300]');
            $this->form_validation->set_rules('mail_date', 'Tanggal Surat', 'trim|required');
            $this->form_validation->set_rules('receive_date', 'Tanggal Terima', 'trim|required');
            $this->form_validation->set_rules('label', 'Label', 'trim|required');

            if ($this->form_validation->run() == FALSE)
            {
                $data = [
                    "operation" => "warning",
                    "message" => validation_errors()
                ];
            }
            else
            {
                $data = [
                    'subject' => $this->input->post('subject'),
                    'agenda_number' => $this->input->post('no_agenda'),
                    'mail_number' => $this->input->post('no_mail'),
                    'mail_date' => date_format(date_create($this->input->post('mail_date')), "Y-m-d"),
                    'receive_date' => date_format(date_create($this->input->post('receive_date')), "Y-m-d"),
                    'receiver' => $this->input->post('receiver'),
                    'authorizing_signature' => $this->input->post('signature'),
                    'attachment' => $_FILES["attachment"]["name"],
                    'label_id' => $this->input->post('label'),
                ];

                $result = $this->inbox_model->create($data);
                if(isset($result["upload"]) && !$result["upload"]){
                    $data = [
                        "operation" => "warning",
                        "message" => $result["message"]
                    ];
                }
                else if($result["query"]){
                    $this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "In-mail successfully created");
                    redirect("inbox");
                    return;
                }
                else{
                    $data = [
                        "operation" => "warning",
                        "message" => "Something is getting wrong",
                    ];
                }
            }
        }
        $data['title'] = "Create In-mail";
        $data['page'] = "inbox/create";
        $data['agenda'] = $this->inbox_model->next_agenda();
        $data['labels'] = $this->label_model->read();
        $this->load->view('templates/template', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'title' => "Edit In-mail",
            'page' => "inbox/edit",
            'mail' => $this->inbox_model->read($id)
        ];
        $this->load->view('templates/template', $data);
    }

    public function update()
    {
        if($this->input->server('REQUEST_METHOD') == "POST")
        {
            $this->form_validation->set_rules('no_agenda', 'No Agenda', 'trim|required');
            $this->form_validation->set_rules('no_mail', 'No Surat', 'trim|required');
            $this->form_validation->set_rules('subject', 'Perihal', 'trim|required|max_length[300]');
            $this->form_validation->set_rules('signature', 'Disposisi', '');
            $this->form_validation->set_rules('receiver', 'Tujuan', 'trim|required|max_length[300]');
            $this->form_validation->set_rules('mail_date', 'Tanggal Surat', 'trim|required');
            $this->form_validation->set_rules('receive_date', 'Tanggal Terima', 'trim|required');
            $this->form_validation->set_rules('label', 'Label', 'trim|required');

            if ($this->form_validation->run() == FALSE)
            {
                $data = [
                    "operation" => "warning",
                    "message" => validation_errors()
                ];
            }
            else
            {
                $data = [
                    'subject' => $this->input->post('subject'),
                    'agenda_number' => $this->input->post('subject'),
                    'mail_number' => $this->input->post('subject'),
                    'mail_date' => $this->input->post('subject'),
                    'receive_date' => $this->input->post('subject'),
                    'receiver' => $this->input->post('subject'),
                    'authorizing_signature' => $this->input->post('subject'),
                ];

                $result = $this->inbox_model->update($data, $this->input->post('id'));
                if(isset($result["upload"]) && !$result["upload"]){
                    $data = [
                        "operation" => "warning",
                        "message" => $result["message"]
                    ];
                }
                else if($result["query"]){
                    $this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "In-mail successfully created");
                    redirect("login");
                    return;
                }
                else{
                    $data = [
                        "operation" => "warning",
                        "message" => "Something is getting wrong",
                    ];
                }
            }
        }
        $data['title'] = "Create In-mail";
        $data['page'] = "inbox/create";
        $this->load->view('templates/template', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title' => "Detail In-mail",
            'page' => "inbox/show",
            'mail' => $this->inbox_model->read($id)
        ];
        $this->load->view('templates/template', $data);
    }

    public function delete($id)
    {
        $result = $this->inbox_model->delete($id);
        if($result){
            $this->session->set_flashdata("operation", "warning");
            $this->session->set_flashdata("message", "In-mail successfully deleted");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "Something is getting wrong");
        }
        redirect("inbox");
    }
}