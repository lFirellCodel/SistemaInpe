<?php

require_once './config.php';

$nombres = $_POST['nombres'];
$fecha_nac = $_POST['fecha_nac'];
$lugar_nac = $_POST['lugar_nac'];
$grado_ints = $_POST['grado_ints'];
$delito = $_POST['delito'];
$e_civil = $_POST['e_civil'];
$ocup_ac= $_POST['ocup_ac'];
$ocupa_an= $_POST['ocupa_an'];


$nuevafecha= date('Y-m-d', strtotime($fecha_nac));

function calculaedad($fechanacimiento){
	list($ano,$mes,$dia) = explode("-",$fechanacimiento);
	$ano_diferencia  = date("Y") - $ano;
	$mes_diferencia = date("m") - $mes;
	$dia_diferencia   = date("d") - $dia;
	if ($dia_diferencia < 0 || $mes_diferencia < 0)
		$ano_diferencia--;
	return $ano_diferencia;
}
$edad = calculaedad($nuevafecha);

$inpe = new Inpe();

$inpe->nombres =$nombres;
$inpe->fecha_nac = $edad; 
$inpe->lugar_nac=$lugar_nac;
$inpe->grado_inst=$grado_ints;
$inpe->delito= $delito;
$inpe->est_civil=$e_civil;
$inpe->ocupa_act=$ocup_ac;
$inpe->ocupa_ant=$ocupa_an;



try{
    
    InpeDAO::registrar($inpe);
    
    $mensaje = array('type' => 'success', 'message' => 'Registro satisfactorio');
    echo json_encode($mensaje);
    
} catch (Exception $e){
    $mensaje = array('type' => 'error', 'message' => $e->getMessage());
    echo json_encode($mensaje);
}