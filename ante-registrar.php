<?php
require_once './config.php';

$detalle=$_POST['detalle'];  
$chk="";  
foreach($detalle as $chk1)  
   {  
      $chk .= $chk1.",";  
   } 
   

 $com_drogas = $_POST['com_drogas'];
 
 $edad_com = $_POST['edad_com'];
 $tipo_com = $_POST['tipo_com'];
 $presen_tatu= $_POST['presen_tatu'];
 $lugar_tatu = $_POST['lugar_tatu'];

$moti_tatu=$_POST['moti_tatu'];  
$moti="";  
foreach($moti_tatu as $tatus)  
   {  
      $moti .= $tatus.",";  
   } 
   
 $causa_estig = $_POST['causa_estig'];
 $causa ="";
 foreach($causa_estig as $estig)  
   {  
      $causa .= $estig.",";  
   } 
   
$presen_corte = $_POST['presen_corte'];
  
$ante = new Antecedentes();

$ante->detalle =$chk;
$ante->com_droga = $com_drogas; 
$ante->edad_com=$edad_com;
$ante->tipo_com=$tipo_com;
$ante->presen_tatu=$presen_tatu;
$ante->moti_tatu= $moti;
$ante->causa_estig=$causa;
$ante->lugar_tatu=(is_null($lugar_tatu)=== TRUE?"no presenta tauajes" : $lugar_tatu);
$ante->presen_corte=$presen_corte;

try{
    
    AntecedentesDAO::registrar($ante);
    
    $mensaje = array('type' => 'success', 'message' => 'Registro satisfactorio');
    echo json_encode($mensaje);
    
} catch (Exception $e){
    $mensaje = array('type' => 'error', 'message' => $e->getMessage());
    echo json_encode($mensaje);
}