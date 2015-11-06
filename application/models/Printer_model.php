<?php

/**
 * Created by PhpStorm.
 * User: Angga
 * Date: 11/6/2015
 * Time: 10:02 AM
 */
class Printer_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("pdf");
    }

    public function print_inbox($id)
    {
        $this->load->model("Inbox_model", "inbox_model");
        $mail = $this->inbox_model->read($id);

        $this->pdf->init("P", "A4", 20, 20, "", "Kemendesa Mailbox");
        $this->pdf->SetAutoPageBreak(true, 30);

        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(0, 5, 'KEMENTRIAN DESA, PEMBANGUNAN DAERAH TERTINGGAL', 0, 1, 'C');
        $this->pdf->Cell(0, 5, 'DAN TRANSMIGRASI REPUBLIK INDONESIA', 0, 1, 'C');
        $this->pdf->Cell(0, 5, 'SEKRETARIAT JENDRAL', 0, 1, 'C');

        $this->pdf->SetFont('Arial', '', 8);
        $this->pdf->SetTextColor(100, 100, 100);
        $this->pdf->Cell(0, 5, 'JL ABDUL MUIS NO 7 JAKARTA PUSAT 10110, TLP 021 3500334, FAX 021 3864607', 0, 1, 'C');
        $this->pdf->Cell(0, 5, 'JL TMP KALIBATA NO 17 JAKARTA SELATAN 12740, TLP 021 7989924, FAX 021 7974488', 0, 1, 'C');

        $this->pdf->Ln(4);

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->Cell(0, 7, "LEMBAR DISPOSISI", 1, 1, 'C');

        $x = $this->pdf->GetX();
        $y = $this->pdf->GetY();

        $this->pdf->Cell(2, 10, "", 0, 0);
        $this->pdf->Cell(20, 7, "Surat Dari", 0, 0, 'L');
        $this->pdf->Cell(5, 7, ":", 0, 0, 'L');
        $this->pdf->SetXY(47, $y + 1.5);
        $this->pdf->MultiCell(60, 4, $mail["from"], 0, 'L');

        $this->pdf->Cell(2, 7, "", 0, 0);
        $this->pdf->Cell(20, 7, "No Surat", 0, 0, 'L');
        $this->pdf->Cell(5, 7, ":", 0, 0, 'L');
        $this->pdf->MultiCell(60, 7, $mail["mail_number"], 0, 'L');

        $this->pdf->Cell(2, 7, "", 0, 0);
        $this->pdf->Cell(20, 7, "Tgl. Surat", 0, 0, 'L');
        $this->pdf->Cell(5, 7, ":", 0, 0, 'L');
        $this->pdf->MultiCell(60, 7, date_format(date_create($mail['mail_date']), 'd F Y'), 0, 'L');

        $this->pdf->Cell(2, 7, "", 0, 0);
        $this->pdf->Cell(20, 7, "Lampiran", 0, 0, 'L');
        $this->pdf->Cell(5, 7, ":", 0, 0, 'L');
        $this->pdf->MultiCell(60, 7, "", 0, 'L');

        // border left
        $y_end = $this->pdf->GetY();
        $height = $y_end - $y;

        // RIGHT SIDE
        $this->pdf->SetXY(110, 56);
        $this->pdf->Cell(2, 7, "", 0, 0);
        $this->pdf->Cell(25, 7, "Diterima Tgl", 0, 0, 'L');
        $this->pdf->Cell(5, 7, ":", 0, 0, 'L');
        $this->pdf->MultiCell(50, 7, date_format(date_create($mail['received_date']), 'd F Y'), 0, 'L');

        $this->pdf->SetXY(110, $this->pdf->GetY());
        $this->pdf->Cell(2, 7, "", 0, 0);
        $this->pdf->Cell(25, 7, "No Agenda", 0, 0, 'L');
        $this->pdf->Cell(5, 7, ":", 0, 0, 'L');
        $this->pdf->MultiCell(50, 7, $mail['agenda_number'], 0, 'L');

        $this->pdf->SetXY(110, $this->pdf->GetY());
        $this->pdf->Cell(2, 7, "", 0, 0);
        $this->pdf->Cell(25, 7, "Sifat", 0, 0, 'L');
        $this->pdf->Cell(5, 7, ":", 0, 0, 'L');

        $this->load->model('Label_model', 'label_model');
        $labels = $this->label_model->read();

        foreach($labels as $label):
            if($label['id'] > 1){
                if($label['id'] ==  $mail['label_id']){
                    $this->pdf->Rect(143, $this->pdf->GetY() + 2, 4, 4, 'F');
                }
                else{
                    $this->pdf->Rect(143, $this->pdf->GetY() + 2, 4, 4);
                }

                $this->pdf->SetXY(150, $this->pdf->GetY() + 2);
                $this->pdf->Cell(50, 4, $label['label'], 0, 1, 'L');
            }

        endforeach;

        // border right
        $y_end_right = $this->pdf->GetY();
        $height_right = $y_end_right - $y;

        if($height > $height_right){
            $this->pdf->Rect($x, $y, 90, $height + 3);
            $this->pdf->Rect(110, $y, 80, $height + 3);
            $current_y = $y + $height + 3;
        }
        else{
            $this->pdf->Rect($x, $y, 90, $height_right + 3);
            $this->pdf->Rect(110, $y, 80, $height_right + 3);
            $current_y = $y + $height_right + 3;
        }


        $y_subject = $this->pdf->GetY();
        $this->pdf->Ln(4);

        // new subject row
        $this->pdf->setY($current_y);
        $this->pdf->Cell(2, 10, "", 0, 0);
        $this->pdf->Cell(20, 7, "Perihal", 0, 0, 'L');
        $this->pdf->Cell(5, 7, ":", 0, 1, 'L');
        $this->pdf->Cell(2, 10, "", 0, 0);
        $this->pdf->MultiCell(166, 7, "Kementrian PAN dan RB Kementrian PAN dan RB Kementrian PAN dan RB ", 0, 'L');

        $height = $this->pdf->GetY() - $y_subject;
        $this->pdf->Rect($x, $current_y, 170, $height);

        // signature
        $signature_y = $this->pdf->GetY()+3;
        $this->pdf->Ln(4);
        //$this->pdf->SetXY(110, $this->pdf->GetY());

        $y_signature = $this->pdf->GetY();
        $this->pdf->Cell(2, 7, "", 0, 0);
        $this->pdf->Cell(25, 7, "Diteruskan Kepada Srd :", 0, 0, 'L');
        $this->pdf->Cell(5, 7, ":", 0, 0, 'L');

        $divisions = $this->inbox_model->read_division();
        $mail_divisions = $this->inbox_model->read_division($id);
        $this->pdf->Ln(6);

        foreach($divisions as $division):
            $checked = false;
            foreach($mail_divisions as $mdiv){
                if($division['id'] == $mdiv['id']){
                    $checked = true;
                    break;
                }
            }

            if($checked){
                $this->pdf->Rect(24, $this->pdf->GetY() + 2, 4, 4, 'F');
            }
            else{
                $this->pdf->Rect(24, $this->pdf->GetY() + 2, 4, 4);
            }

            $this->pdf->SetXY(30, $this->pdf->GetY() + 2);
            $this->pdf->Cell(50, 4, $division['division'], 0, 1, 'L');
        endforeach;


        if(trim($mail['authorizing_signature']) == ''){
            $this->pdf->Rect(24, $this->pdf->GetY() + 2, 4, 4);
            $this->pdf->SetXY(30, $this->pdf->GetY() + 2);
            $this->pdf->Cell(50, 4, ". . . . . . . . . . . . . . . . .", 0, 1, 'L');
        }
        else{
            $this->pdf->Rect(24, $this->pdf->GetY() + 2, 4, 4, 'F');
            $this->pdf->SetXY(30, $this->pdf->GetY() + 2);
            $this->pdf->Cell(50, 4, $mail['to'], 0, 1, 'L');
        }




        // signature
        $this->pdf->SetXY(110, $y_signature);
        $this->pdf->Cell(2, 7, "", 0, 0);
        $this->pdf->Cell(25, 7, "Disposisi", 0, 0, 'L');
        $this->pdf->Cell(5, 7, ":", 0, 1, 'L');

        $signature_height = $this->pdf->GetY();

        $signatures = $this->inbox_model->read_signature();
        $mail_signatures = $this->inbox_model->read_signature($id);

        foreach($signatures as $signature):
            $checked = false;
            foreach($mail_signatures as $msig){
                if($signature['id'] == $msig['id']){
                    $checked = true;
                    break;
                }
            }
            if($checked){
                $this->pdf->Rect(114.3, $this->pdf->GetY() + 2, 4, 4, 'F');
            }
            else{
                $this->pdf->Rect(114.3, $this->pdf->GetY() + 2, 4, 4);
            }

            $this->pdf->SetXY(120.3, $this->pdf->GetY() + 2);
            $this->pdf->Cell(50, 4, $signature['signature'], 0, 1, 'L');
        endforeach;


        if(trim($mail['authorizing_signature']) == ''){
            $this->pdf->Rect(114.3, $this->pdf->GetY() + 2, 4, 4);
            $this->pdf->SetXY(120.3, $this->pdf->GetY() + 2);
            $this->pdf->Cell(50, 4, ". . . . . . . . . . . . . . . . .", 0, 1, 'L');
        }
        else{
            $this->pdf->Rect(114.3, $this->pdf->GetY() + 2, 4, 4, 'F');
            $this->pdf->SetXY(120.3, $this->pdf->GetY() + 2);
            $this->pdf->Cell(50, 4, $mail['authorizing_signature'], 0, 1, 'L');
        }

        $this->pdf->Rect($x, $signature_y, 170, $signature_height + 15);


        $this->pdf->setY($signature_y + $signature_height + 18);
        $this->pdf->Rect($x, $this->pdf->GetY() - 3, 170, 30);
        $this->pdf->Cell(2, 10, "", 0, 0);
        $this->pdf->Cell(20, 7, "Catatan", 0, 0, 'L');
        $this->pdf->Cell(5, 7, ":", 0, 0, 'L');

        $this->pdf->SetX(-70);
        $this->pdf->Cell(50, 5, "Sekretaris Jendral", 0, 1, 'C');
        $this->pdf->Ln(15);
        $this->pdf->SetX(-70);
        $this->pdf->Cell(50, 5, "Anwar Sanusi", 0, 1, 'C');

        $filename = "Lembar Disposisi - ".$mail['agenda_number'].".pdf";
        $this->pdf->Output($filename, "I");
    }

}