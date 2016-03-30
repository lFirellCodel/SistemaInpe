<?php
require_once './config.php';

$con = Conexion::getConexion();
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

$query = "SELECT * FROM internos";
$stmt = $con->prepare($query);
$stmt->execute();

$rows = array();

//$rows = $smt->fetchAll(\PDO::FETCH_OBJ);


while($objeto = $stmt->fetch(PDO::FETCH_ASSOC)){
   
            $row[0] = $objeto["nombres"];
            $row[1] = $objeto["num_ingreso"];
          array_push($rows,$row);
}
print json_encode($rows, JSON_NUMERIC_CHECK);

