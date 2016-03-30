<?php

require_once './config.php';

$detalle= $_POST['caja'];
var_dump($detalle);
$problema=$_POST['problema'];  
$pb="";  
foreach($problema as $prob)  
   {  
      $pb .= $prob.",";  
   }    


$prob= new Problema();
   
$prob->problema_act = $detalle;
$prob->especifico = $pb;
 
   try {
       ProblemaDAO::registrar($prob);
       $mensaje = array('type'=>'success', 'message'=>'registro completado con exito');
       json_encode($mensaje);
} catch (Exception $e) {
       $mensaje = array('type'=>'error', 'message'=> $e->getMessage());
}