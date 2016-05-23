<?php
require_once './config.php';

$email = $_POST['email'];
$password = $_POST['password'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$id = (int)$_POST['id']; 
$estado = '1';

$cliente = new Cliente();
$cliente->email = $email;
$cliente->password = $password;
$cliente->nombres = $nombres;
$cliente->apellidos = $apellidos;
$cliente->id = $id;
$cliente->estado = $estado;

try{
    
    ClientesDAO::editar($cliente);
    
    $mensaje = array('type' => 'success', 'message' => 'Registro satisfactorio');
    echo json_encode($mensaje);
    
} catch (Exception $e){
    $mensaje = array('type' => 'error', 'message' => $e->getMessage());
    echo json_encode($mensaje);
}