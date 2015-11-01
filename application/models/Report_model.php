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
            ->where('mail_date', date('Y-m-d'))
            ->order_by('id', 'DESC')
            ->get()->result_array();

        $inbox = $this->db
            ->select("inbox.*, labels.label")
            ->from('inbox')
            ->join("labels", "label_id = labels.id")
            ->where('received_date', date('Y-m-d'))
            ->order_by('mail_date', 'DESC')
            ->get()->result_array();

        for($i = 0; $i < count($inbox); $i++){
            $inbox[$i]['attachment_original'] = $this->db->get_where('inbox_attachment', ['inbox_id' => $inbox[$i]['id'], 'type' => 'ORIGINAL'])->result_array();
            $inbox[$i]['attachment_signature'] = $this->db->get_where('inbox_attachment', ['inbox_id' => $inbox[$i]['id'], 'type' => 'SIGNATURE'])->result_array();
        }

        for($i = 0; $i < count($outbox); $i++){
            $outbox[$i]['attachment_original'] = $this->db->get_where('outbox_attachment', ['outbox_id' => $outbox[$i]['id'], 'type' => 'ORIGINAL'])->result_array();
        }

        return ["outbox" => $outbox, "inbox" => $inbox];
    }

    public function get_report_weekly()
    {
        $outbox = $this->db
            ->select("outbox.*, labels.label")
            ->from("outbox")
            ->join("labels", "label_id = labels.id")
            ->order_by('mail_date', 'DESC')
            ->limit(7)
            ->get()->result_array();

        $inbox = $this->db
            ->select("inbox.*, labels.label")
            ->from('inbox')
            ->join("labels", "label_id = labels.id")
            ->order_by('mail_date', 'DESC')
            ->limit(7)
            ->get()->result_array();

        for($i = 0; $i < count($inbox); $i++){
            $inbox[$i]['attachment_original'] = $this->db->get_where('inbox_attachment', ['inbox_id' => $inbox[$i]['id'], 'type' => 'ORIGINAL'])->result_array();
            $inbox[$i]['attachment_signature'] = $this->db->get_where('inbox_attachment', ['inbox_id' => $inbox[$i]['id'], 'type' => 'SIGNATURE'])->result_array();
        }

        for($i = 0; $i < count($outbox); $i++){
            $outbox[$i]['attachment_original'] = $this->db->get_where('outbox_attachment', ['outbox_id' => $outbox[$i]['id'], 'type' => 'ORIGINAL'])->result_array();
        }

        return ["outbox" => $outbox, "inbox" => $inbox];
    }

    public function get_report_all()
    {
        $result = $this->db->query("
          SELECT all_date, COUNT(inbox.id) AS inbox, COUNT(outbox.id) AS outbox
          FROM (SELECT DISTINCT mail_date AS all_date FROM inbox UNION SELECT mail_date FROM outbox) date
          LEFT JOIN inbox ON inbox.mail_date = all_date
          LEFT JOIN outbox ON outbox.mail_date = all_date
          GROUP BY all_date
          ORDER BY all_date DESC
        ");

        return $result->result_array();
    }

    public function chart()
    {
        $result = $this->db->query("
          SELECT all_date, COUNT(inbox.id) AS inbox, COUNT(outbox.id) AS outbox
          FROM (SELECT DISTINCT mail_date AS all_date FROM inbox UNION SELECT mail_date FROM outbox) date
          LEFT JOIN inbox ON inbox.mail_date = all_date
          LEFT JOIN outbox ON outbox.mail_date = all_date
          GROUP BY all_date
          ORDER BY all_date DESC
          LIMIT 7
        ");

        return $result->result_array();
    }

}