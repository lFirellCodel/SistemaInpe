<?php
require_once './config.php';

$estado = $_POST['estado'];
$delito= $_POST['delito'];
$num_anos = $_POST['num_anos'];
$num_ingresos = $_POST['num_ingresos'];
$tipo_delito = $_POST['tipo_delito'];
$fecha_ingre = $_POST['fecha_ingre'];
$pab_actual = $_POST['pab_actual'];
$pab_clasificado= $_POST['pab_clasificado'];

$nuevafecha = date('Y-m-d', strtotime($fecha_ingre));

$juri = new Juridica();

$juri->estado =$estado;
$juri->delito = $delito; 
$juri->num_anos=$num_anos;
$juri->num_ingresos=$num_ingresos;
$juri->tipo_delito=$tipo_delito;
$juri->fecha_ingre= $nuevafecha;
$juri->pab_actual=$pab_actual;
$juri->pab_clasificado=$pab_clasificado;


try{
    
    JuridicaDAO::registrar($juri);
    
    $mensaje = array('type' => 'success', 'message' => 'Registro satisfactorio');
    echo json_encode($mensaje);
    
} catch (Exception $e){
    $mensaje = array('type' => 'error', 'message' => $e->getMessage());
    echo json_encode($mensaje);
}