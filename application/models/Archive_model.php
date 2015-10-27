<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/28/2015
 * Time: 5:28 AM
 */
class Archive_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function archive()
    {
        $result = $this->db->query("
            SELECT id, mail_number, subject, mail_date, 'In-Mail' as type
            FROM inbox
            UNION
            SELECT id, mail_number, subject, mail_date, 'Out-Mail' as type
            FROM outbox
        ");

        return $result->result_array();
    }

}