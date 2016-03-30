<?php

require_once './config.php';

$participa = $_POST['participa'];


$nada2= "El interno no resibe tratamiento";
$tratamiento=$_POST['tratamiento'];  
$t="";  
foreach($tratamiento as $t1)  
   {  
      $t .= $t1.",";  
   } 
$motivo=$_POST['motivo'];
$nada= "El interno se encuntra en tratamiento";

//if(is_null($motivo)){
//    
//}else{
$moti="";  
foreach($motivo as $moti2)  
   {  
      $moti .= $moti2.",";  
   }   


$trata= new Tratamiento();
   
$trata->participa_trata = $participa;
$trata->tratamiento = (is_null($tratamiento)== TRUE?$nada2:$t);
$trata->motivo= (is_null($motivo)== TRUE?$nada:$moti);

   try {
       TratamientoDAO::registrar($trata);
       $mensaje = array('type'=>'success', 'message'=>'registro completado con exito');
       json_encode($mensaje);
} catch (Exception $e) {
       $mensaje = array('type'=>'error', 'message'=> $e->getMessage());
}