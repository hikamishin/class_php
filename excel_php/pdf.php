<?php

require_once('tcpdf/tcpdf.php');



ob_start();
// // create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set font
$pdf->SetFont('msungstdlight', '', 10);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();


$html = 'TEST';
// // output the HTML content
$pdf->writeHTML($html);
//file send to file address
$path = "/123info.pdf";
//Close and output PDF document
$pdf->Output(__DIR__ .$path, 'D');
//$pdf->Output($No."-tableinfo.pdf", 'D');
ob_end_flush();



?>