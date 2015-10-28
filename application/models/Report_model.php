<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/28/2015
 * Time: 8:09 AM
 */
class Report_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_report_today()
    {
        $outbox = $this->db
            ->select("outbox.*, labels.label")
            ->from("outbox")
            ->join("labels", "label_id = labels.id")
            ->order_by('mail_date', 'DESC')
            ->get();

        $inbox = $this->db
            ->select("inbox.*, labels.label")
            ->from('inbox')
            ->join("labels", "label_id = labels.id")
            ->order_by('mail_date', 'DESC')
            ->get();

        return ["outbox" => $outbox->result_array(), "inbox" => $inbox->result_array()];
    }

    public function get_report_weekly()
    {
        $outbox = $this->db
            ->select("outbox.*, labels.label")
            ->from("outbox")
            ->join("labels", "label_id = labels.id")
            ->order_by('mail_date', 'DESC')
            ->limit(7)
            ->get();

        $inbox = $this->db
            ->select("inbox.*, labels.label")
            ->from('inbox')
            ->join("labels", "label_id = labels.id")
            ->order_by('mail_date', 'DESC')
            ->limit(7)
            ->get();

        return ["outbox" => $outbox->result_array(), "inbox" => $inbox->result_array()];
    }

    public function get_report_all()
    {

    }

}