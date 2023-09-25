<?php
date_default_timezone_set('Europe/Helsinki');
$date = date('d-m-y h:i:s');
require "TCPDF/tcpdf.php";
$bill = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$bill->setPrintHeader(false);
$bill->setPrintFooter(false);
$bill->SetFont('dejavusans', '', 12);
$bill->AddPage();

$bill->setXY(8, 60);
$bill->Cell(0, 0, 'Наименование организации: '.$_POST['userName'], 0, 0, 'L', 0, '', 0);

$bill->setXY(8, 75);
$bill->Cell(0, 0, 'Электронный адрес: '.$_POST['userEmail'], 0, 0, 'L', 0, '', 0);

$bill->setXY(8, 70);
$bill->Cell(0, 0, 'Регистрационный номер: '.$_POST['userRegNum'], 0, 0, 'L', 0, '', 0);

$bill->setXY(8, 65);
$bill->Cell(0, 0, 'Юридический адрес: '.$_POST['userGeo'], 0, 0, 'L', 0, '', 0);

$bill->setXY(85, 81);
$bill->Cell(0, 0, 'Документ №: '.$_POST['docNR'], 0, 0, 'L', 0, '', 0);

$bill->Image('images/logo.jpg', 8, 8, 50, 50, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);

$bill->setXY(140, 60);
// $bill->Cell(0, 0, 'Дата документа: '.$date, 0, 0, 'L', 0, '', 0);
$bill->Cell(0, 0, 'Дата документа: '.$_POST['docDate'], 0, 0, 'L', 0, '', 0);

$bill->setXY(140, 65);
$bill->Cell(0, 0, 'Основание: '.$_POST['basedOn'], 0, 0, 'L', 0, '', 0);


$bill->Output('example_002.pdf', 'I');
?>