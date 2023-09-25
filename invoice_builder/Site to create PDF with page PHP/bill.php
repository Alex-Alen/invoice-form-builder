<?php
date_default_timezone_set('Europe/Helsinki');
$date = date('d-m-y h:i:s');
require "TCPDF/tcpdf.php";
$bill = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$bill->setPrintHeader(false);
$bill->setPrintFooter(false);
$bill->SetFont('dejavusans', '', 12);
$bill->AddPage();

$bill->setXY(145, 8);
$bill->Cell(0, 0, 'Client name: '.$_POST['ClientName'], 0, 0, 'L', 0, '', 0);

$bill->setXY(8, 70);
$bill->Cell(0, 0, 'Client registration number: '.$_POST['ClientRegNum'], 0, 0, 'L', 0, '', 0);

$bill->setXY(8, 65);
$bill->Cell(0, 0, 'Client Address: '.$_POST['ClientAddr'], 0, 0, 'L', 0, '', 0);

$bill->Image('images/logo.jpg', 8, 8, 50, 50, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);

$bill->setXY(145, 13);
$bill->Cell(0, 0, 'Date: '.$date, 0, 0, 'L', 0, '', 0);

$bill->Output('example_002.pdf', 'I');
?>