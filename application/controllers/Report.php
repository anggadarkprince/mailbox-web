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

        $this->load->model("Report_model", "report_model");
        $this->load->model("User_model", "user_model");
        if(!User_model::is_authorize(User_model::$TYPE_ADM) && !User_model::is_authorize(User_model::$TYPE_DEV))
        {
            redirect("login");
        }
    }

    public function index()
    {
        $data = [
            'title' => "Report",
            'page' => "reports/all",
            'report' => $this->report_model->get_report_all(),
        ];
        $this->load->view('templates/template', $data);
    }

    public function today()
    {
        $data = [
            'title' => "Today",
            'page' => "reports/daily",
            'report' => $this->report_model->get_report_today(),
        ];
        $this->load->view('templates/template', $data);
    }

    public function week()
    {
        $data = [
            'title' => "Weekly",
            'page' => "reports/weekly",
            'report' => $this->report_model->get_report_weekly(),
        ];
        $this->load->view('templates/template', $data);
    }

}