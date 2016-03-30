<?php

require_once './config.php';



$id    = $_POST['id'];
$nombre = $_POST['nombre'];
$edad  = $_POST['edad'];
$ingreso = $_POST['ingreso'];
$lugar  = $_POST['lugar'];
$grado = $_POST['grado'];
$delito  = $_POST['delito'];
$civil = $_POST['civil'];
$oac= $_POST['oac'];
$oan = $_POST['oan'];
$juridica= $_POST['juridica'];


$inpe = new Inpe();

$inpe->id    = $id;
$inpe->nombres   = $nombre;
$inpe->fecha_nac   = $edad;
$inpe->num_ingreso = $ingreso;
$inpe->lugar_nac  = $lugar;
$inpe->grado_inst    = $grado;
$inpe->delito   = $delito;
$inpe->est_civil   = $civil;
$inpe->ocupa_act = $oac;
$inpe->ocupa_ant  = $oan;
$inpe->sit_juridica  = $juridica;
try{
    
    InpeDAO::update($inpe);
   
    $mensaje = array('type' => 'success', 'message' => 'Registro satisfactorio');
    echo json_encode($mensaje);



} catch (Exception $e){
    $mensaje = array('type' => 'error', 'message' => $e->getMessage());
    echo json_encode($mensaje);
}