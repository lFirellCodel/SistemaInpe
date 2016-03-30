<?php
 require_once './config.php';

$id = $_POST['id'];

try {
    PsicosocialesDAO::eliminar($id);
    
    $mensaje = array('type'=>'success', 'message'=> 'Registro eliminado con exito');
    echo json_encode($mensaje);
} catch (PDOException $e) {
    $mensaje=array('type'=>'error', 'message'=>$e->getMessage());
    echo json_encode($mensaje);
}


