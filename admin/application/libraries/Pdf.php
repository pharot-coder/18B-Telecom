<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf_min/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    //Page header
    public function Header()
    {
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, 'Order Information', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    // Colored table
    // public function ColoredTable($header, $data)
    // {
    //     // Colors, line width and bold font
    //     $this->SetFillColor(255, 0, 0);
    //     $this->SetTextColor(255);
    //     $this->SetDrawColor(128, 0, 0);
    //     $this->SetLineWidth(0.3);
    //     $this->SetFont('', 'B');
    //     // Header
    //     $w = array(20, 50, 30, 30, 40);
    //     $num_headers = count($header);
    //     for ($i = 0; $i < $num_headers; ++$i) {
    //         $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
    //     }
    //     $this->Ln();
    //     // Color and font restoration
    //     $this->SetFillColor(224, 235, 255);
    //     $this->SetTextColor(0);
    //     $this->SetFont('');
    //     // Data
    //     $fill = 0;
    //     $cnt = 1;
    //     foreach ($data as $row) {
    //         $subtotal = $row['qty'] * $row['price'];
    //         $this->Cell($w[0], 6, $cnt++, 'LR', 0, 'L', $fill);
    //         $this->Cell($w[1], 6, $row['productname'], 'LR', 0, 'L', $fill);
    //         $this->Cell($w[2], 6, $row['qty'], 'LR', 0, 'L', $fill);
    //         $this->Cell($w[3], 6, $row['price'], 'LR', 0, 'R', $fill);
    //         $this->Cell($w[4], 6, number_format($subtotal), 'LR', 0, 'R', $fill);
    //         $this->Ln();
    //         $fill = !$fill;
    //     }
    //     $this->Cell(array_sum($w), 0, '', 'T');
    // }
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */