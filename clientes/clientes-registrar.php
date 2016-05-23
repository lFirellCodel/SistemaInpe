<?php

require_once './config.php';

$email = $_POST['email'];
$password = $_POST['password'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];

$cliente = new Cliente();
$cliente->email = $email;
$cliente->password = $password;
$cliente->nombres = $nombres;
$cliente->apellidos = $apellidos;

try{
    
    ClientesDAO::registrar($cliente);

    $mensaje = array('type' => 'success', 'message' => 'Registro satisfactorio');
    echo json_encode($mensaje);
    
} catch (Exception $e){
    $mensaje = array('type' => 'error', 'message' => $e->getMessage());
    echo json_encode($mensaje);
}