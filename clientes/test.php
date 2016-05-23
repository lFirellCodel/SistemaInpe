<?php
require_once './config.php';

//$lista = ClientesDAO::listar();
//var_dump($lista);

$cliente = new Cliente();
$cliente->email = 'mpinedo@tecsup.edu.pe';
$cliente->password = 'tecsup';
$cliente->nombres = 'Mayra';
$cliente->apellidos = 'Pinedo';

ClientesDAO::registrar($cliente);