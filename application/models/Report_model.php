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

}