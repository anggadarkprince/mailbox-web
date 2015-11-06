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
        if($this->session->userdata(User_model::$SESSION_LOCK) != null){
            redirect("lockscreen");
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
            $this->form_validation->set_rules('from', 'Dari', 'trim|required|max_length[300]');
            $this->form_validation->set_rules('to', 'Tujuan', 'max_length[300]');
            $this->form_validation->set_rules('mail_date', 'Tanggal Surat', 'trim|required');
            $this->form_validation->set_rules('received_date', 'Tanggal Terima', 'trim|required');
            $this->form_validation->set_rules('label', 'Label', 'trim|required');
            $this->form_validation->set_rules('divisions[]', 'Terusan', 'min_length[0]');
            $this->form_validation->set_rules('signatures[]', 'List Disposisi', 'min_length[0]');

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
                    'received_date' => date_format(date_create($this->input->post('received_date')), "Y-m-d"),
                    'from' => $this->input->post('from'),
                    'to' => $this->input->post('to'),
                    'authorizing_signature' => $this->input->post('signature'),
                    'label_id' => $this->input->post('label'),
                ];

                $division = $this->input->post('divisions');
                $signature = $this->input->post('signatures');

                $result = $this->inbox_model->create($data, $division, $signature);
                if(isset($result["upload"]) && !$result["upload"]){
                    $data = [
                        "operation" => "warning",
                        "message" => $result["message"]
                    ];
                }
                else if($result["query"]){
                    $this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>In-mail</strong> successfully created");
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
        $data['divisions'] = $this->inbox_model->read_division();
        $data['signatures'] = $this->inbox_model->read_signature();
        $data['labels'] = $this->label_model->read();
        $this->load->view('templates/template', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => "Edit In-mail",
            'page' => "inbox/edit",
            'labels' => $this->label_model->read(),
            'mail' => $this->inbox_model->read($id),
            'attachment_original' => $this->inbox_model->read_attachment($id, 'ORIGINAL'),
            'attachment_signature' => $this->inbox_model->read_attachment($id, 'SIGNATURE')
        ];
        $this->load->view('templates/template', $data);
    }

    public function update($id)
    {
        if($this->input->server('REQUEST_METHOD') == "POST")
        {
            $this->form_validation->set_rules('id', 'Mail ID unavailable', 'trim|required');
            $this->form_validation->set_rules('no_agenda', 'No Agenda', 'trim|required');
            $this->form_validation->set_rules('no_mail', 'No Surat', 'trim|required');
            $this->form_validation->set_rules('subject', 'Perihal', 'trim|required|max_length[300]');
            $this->form_validation->set_rules('signature', 'Disposisi', 'min_length[0]');
            $this->form_validation->set_rules('from', 'Dari', 'trim|required|max_length[300]');
            $this->form_validation->set_rules('to', 'Tujuan', 'max_length[300]');
            $this->form_validation->set_rules('mail_date', 'Tanggal Surat', 'trim|required');
            $this->form_validation->set_rules('received_date', 'Tanggal Terima', 'trim|required');
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
                    'received_date' => date_format(date_create($this->input->post('received_date')), "Y-m-d"),
                    'from' => $this->input->post('from'),
                    'to' => $this->input->post('to'),
                    'authorizing_signature' => $this->input->post('signature'),
                    'label_id' => $this->input->post('label'),
                ];

                $result = $this->inbox_model->update($data, $this->input->post("id"));
                if(isset($result["upload"]) && !$result["upload"]){
                    $data = [
                        "operation" => "warning",
                        "message" => $result["message"]
                    ];
                }
                else if($result["query"]){
                    $this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>In-mail</strong> successfully updated");
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
        $data['title'] = "Edit In-mail";
        $data['page'] = "inbox/edit";
        $data['labels'] = $this->label_model->read();
        $data['mail'] = $this->inbox_model->read($id);
        $data['attachment_original'] = $this->inbox_model->read_attachment($id, 'ORIGINAL');
        $data['attachment_signature'] = $this->inbox_model->read_attachment($id, 'SIGNATURE');
        $this->load->view('templates/template', $data);
    }

    public function show($id)
    {
        $data = [
            'title' => "Detail In-mail",
            'page' => "inbox/show",
            'mail' => $this->inbox_model->read($id),
            'attachment_original' => $this->inbox_model->read_attachment($id, 'ORIGINAL'),
            'attachment_signature' => $this->inbox_model->read_attachment($id, 'SIGNATURE')
        ];
        $this->load->view('templates/template', $data);
    }

    public function delete($id, $redirect = null)
    {
        $result = $this->inbox_model->delete($id);
        if($result){
            $this->session->set_flashdata("operation", "warning");
            $this->session->set_flashdata("message", "<strong>In-mail</strong> successfully deleted");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "Something is getting wrong");
        }
        if($redirect != null){
            redirect($redirect);
        }
        else{
            redirect("inbox");
        }
    }

    public function delete_attachment($id, $mail)
    {
        $result = $this->inbox_model->delete_attachment($id);
        if($result){
            $this->session->set_flashdata("operation", "warning");
            $this->session->set_flashdata("message", "<strong>Attachment</strong> successfully deleted");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "Something is getting wrong");
        }
        redirect("inbox/edit/".$mail);
    }
}