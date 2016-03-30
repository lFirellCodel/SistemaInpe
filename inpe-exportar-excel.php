<?php

    require_once './config.php';

    $inpe = InpeDAO::listar();
    //  var_dump($eventos);
    $array = json_decode(json_encode($inpe), true);
    var_dump($array[0]);
    ini_set('include_path', ini_get('include_path').';lib/excel/');
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Reporte_Internos.xls");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE USUARIOS</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA USUARIOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
            <td>Nombres y Apellidos</td>
            <td>Edad</td>
            <td>N°ingresos</td>
            <td>Lugar Nacimiento</td>
            <td>Grado de instrucion</td>
            <td>Delito</td>
            <td>Estado Civil</td>
            <td>Ocupacion Actual</td>
            <td>Ocuapacion Anterior</td>
            <td>Sitiacion Juridica</td>
  </tr>
  
<?PHP
		
foreach ($array as $arr){		

	$nombres=$arr["nombres"];
	$fecha_nac=$arr["fecha_nac"];
	$num_ingreso=$arr["num_ingreso"];
	$lugar_nac=$arr["lugar_nac"];
	$grado_inst=$arr["grado_inst"];
	$delito=$arr["delito"];					
        $est_civil=$arr["est_civil"];
	$ocupa_act=$arr["ocupa_act"];
	$ocupa_ant=$arr["ocupa_ant"];
        $sit_juridica=$arr["sit_juridica"];
?>  
 <tr>
	<td><?php echo $nombres; ?></td>
	<td><?php echo $fecha_nac; ?></td>
	<td><?php echo $num_ingreso; ?></td>
	<td><?php echo $lugar_nac; ?></td>
	<td><?php echo $grado_inst; ?></td>
	<td><?php echo $delito; ?></td>   
        <td><?php echo $est_civil; ?></td>
	<td><?php echo $ocupa_act; ?></td>
	<td><?php echo $ocupa_ant; ?></td>  
        <td><?php echo $sit_juridica; ?></td>  
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>
    
   
    