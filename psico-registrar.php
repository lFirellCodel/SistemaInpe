<?php

require_once './config.php';

$factores=$_POST['factores'];  
$fac="";  
foreach($factores as $f)  
   {  
      $fac .= $f.",";  
   } 
   
   
$tipo_fam= $_POST['tipo_fam'];
$tipo_cri = $_POST['tipo_cri'];
$enfermedad = $_POST['enfermedad'];

$apoyo=$_POST['apoyo'];  
$ap="";  
foreach($apoyo as $apy)  
   {  
      $ap .= $apy.",";  
   } 
   
   var_dump($ap);
 
$psico = new Psicosocial();

$psico->con_delictiva =$fac;
$psico->tipo_fam = $tipo_fam; 
$psico->tipo_criam=$tipo_cri;
$psico->apoyo_fam=$ap;
$psico->enfer_padece=$enfermedad;


   
try{
    
    PsicosocialesDAO::registrar($psico);
    
    $mensaje = array('type' => 'success', 'message' => 'Registro satisfactorio');
    echo json_encode($mensaje);
    
} catch (Exception $e){
    $mensaje = array('type' => 'error', 'message' => $e->getMessage());
    echo json_encode($mensaje);
}