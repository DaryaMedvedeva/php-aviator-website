<?php
require('../fpdf181/fpdf.php');
session_start();


$route=$_POST["route"];
$sit=$_POST["sit"];
$dat=$_POST["date"];

// создаем PDF документ
$pdf=new FPDF();

    $pdf->SetTitle("ticket");
    $pdf->AddPage('P');
    
// добавляем шрифт
    $pdf->AddFont('Candara','','Candara.php');
    $pdf->SetFont('Candara');
    $pdf->SetFontSize(16);

// добавляем текст
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"AVIATOR.PHP\n"));
    $pdf->Write(10,iconv('utf-8', 'windows-1251',$_SESSION["surname"]." ".$_SESSION["name"]."\n"));
    $pdf->Write(20,iconv('utf-8', 'windows-1251',"Маршурт: ".$route."\n"));
    $pdf->Write(5,iconv('utf-8', 'windows-1251',"Дата и время: ".$dat."\n"));
    $pdf->Write(15,iconv('utf-8', 'windows-1251',"Место: ".$sit."\n"));
    
   $pdf->Output('ticket.pdf','I');
   
  // $pdf->Output('file.pdf','D');
?>