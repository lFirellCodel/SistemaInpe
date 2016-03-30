<?php //
require('./lib/fpdf/fpdf.php');
require_once './config.php';

ini_set('include_path', ini_get('include_path').';lib/fpdf/');
    require_once 'fpdf.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('logo.png' , 10 ,8, 10 , 13,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, 'Tecsup Examen', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE EVENTOS', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(20, 8, 'Nombre', 0);
$pdf->Cell(12, 8, 'Fecha', 0);
$pdf->Cell(20, 8, 'NªIngreso', 0);
$pdf->Cell(20, 8, 'Lugar Nac', 0);
$pdf->Cell(20, 8, 'Instruccion', 0);
$pdf->Cell(20, 8, 'Delito', 0);
$pdf->Cell(20, 8, 'Estado civil', 0);
$pdf->Cell(20, 8, 'Ocup Actual', 0);
$pdf->Cell(20, 8, 'Ocuap Anterior', 0);
$pdf->Cell(16, 8, 'Sit juridica', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA

$lista = InpeDAO::listar();
    
    foreach ($lista as $inpe){
       $pdf->Cell(20, 8,$inpe->nombres,1,0,'L'); 
       $pdf->Cell(12, 8,$inpe->fecha_nac,1,0,'L');
       $pdf->Cell(20, 8,$inpe->num_ingreso,1,0,'L');
       $pdf->Cell(20, 8,$inpe->lugar_nac,1,0,'L');
       $pdf->Cell(20, 8,$inpe->grado_inst,1,0,'L');
       $pdf->Cell(20, 8,$inpe->delito,1,0,'L');
       $pdf->Cell(20, 8,$inpe->est_civil,1,0,'L');
       $pdf->Cell(20, 8,$inpe->ocupa_act,1,0,'L');
       $pdf->Cell(20, 8,$inpe->ocupa_ant,1,0,'L');
       $pdf->Cell(16, 8,$inpe->sit_juridica,1,0,'L');
       $pdf->Ln(8);
    }

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114,8,'',0);
$pdf->Output();
?>