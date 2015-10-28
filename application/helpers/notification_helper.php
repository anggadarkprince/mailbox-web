<?php
/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 10/28/2015
 * Time: 3:37 PM
 */

function get_mail(){
    $CI = get_instance();
    $CI->load->model("Report_model","report");
    return $CI->report->get_report_today();
}

function get_notification(){

}