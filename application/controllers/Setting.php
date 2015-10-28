<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/28/2015
 * Time: 11:16 AM
 */
class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Setting_model","setting_model");
        $this->load->model("User_model","user_model");
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
            'title' => "Settings",
            'page' => "pages/settings",
            'setting' => $this->setting_model->read(),
        ];
        $this->load->view('templates/template', $data);
    }

    public function update()
    {
        if($this->input->server('REQUEST_METHOD') == "POST")
        {
            $this->form_validation->set_rules('website', 'Website Name', 'trim|required');
            $this->form_validation->set_rules('keyword', 'Keyword', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[300]');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('contact', 'Contact', 'trim|required');
            $this->form_validation->set_rules('facebook', 'Facebook', 'min_length[0]');
            $this->form_validation->set_rules('twitter', 'Twitter', 'min_length[0]');
            $this->form_validation->set_rules('google', 'Google', 'min_length[0]');

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
                    'website' => $this->input->post('website'),
                    'keyword' => $this->input->post('keyword'),
                    'description' => $this->input->post('description'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'contact' => $this->input->post('contact'),
                    'facebook' => $this->input->post('facebook'),
                    'twitter' => $this->input->post('twitter'),
                    'google' => $this->input->post('google'),
                    'favicon' => $_FILES["favicon"]["name"],
                ];

                $result = $this->setting_model->update($data, $this->input->post("id"));
                if(isset($result["upload"]) && !$result["upload"]){
                    $data = [
                        "operation" => "warning",
                        "message" => $result["message"]
                    ];
                }
                else if($result["query"]){
                    $this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Setting</strong> successfully updated");
                    redirect("settings");
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

        $data['title'] = "Settings";
        $data['page'] = "pages/settings";
        $data['setting'] = $this->setting_model->read();
        $this->load->view('templates/template', $data);
    }

}