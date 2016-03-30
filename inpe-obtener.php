<?php

require_once './config.php';

$id = $_POST['id'];


//$event = new Evento();

//$event->dato= $dato;



try{

    InpeDAO::obtener(3);
    $l = InpeDAO::obtener(3);
//    var_dump($l);
    #$mensaje = array('type' => 'success', 'message' => 'Registro satisfactorio');
    #echo json_encode($mensaje);

    //enviar datos
    $data = array();
    $data['content'] = $l;
    echo json_encode($data);
    var_dump($data);

    
} catch (Exception $e){
    $mensaje = array('type' => 'error', 'message' => $e->getMessage());
    echo json_encode($mensaje);
}


?>
