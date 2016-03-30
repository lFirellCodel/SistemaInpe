<?php

require_once './config.php';

$dato = $_POST['dato'];


//$event = new Evento();

//$event->dato= $dato;
    


try{
    
    InpeDAO::buscar($dato);
   
   $l =InpeDAO::buscar($dato);
   //var_dump($l);
 
    //$mensaje = array('type' => 'success', 'message' => 'Registro satisfactorio');
//    echo json_encode($mensaje);
    
} catch (Exception $e){
    $mensaje = array('type' => 'error', 'message' => $e->getMessage());
    echo json_encode($mensaje);
}
?>
<html>
    <head>
       <link href="https://fontastic.s3.amazonaws.com/S4oB3JzJncdU5ZEY34cesU/icons.css" rel="stylesheet">
       <link rel="stylesheet" href="style.css">
    </head>
    <body>
<table border="1" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            
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
            <td></td>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($l as $dato){?>
        <tr>
            
            <td><?php echo $dato->nombres?></td>
            <td><?php echo $dato->fecha_nac?></td>
            <td><?php echo $dato->num_ingreso?></td>
            <td><?php echo $dato->lugar_nac?></td>
            <td><?php echo $dato->grado_inst?></td>
            <td><?php echo $dato->delito?></td>
            <td><?php echo $dato->est_civil?></td>
            <td><?php echo $dato->ocupa_act?></td>
            <td><?php echo $dato->ocupa_ant?></td>
            <td><?php echo $dato->sit_juridica?></td>
            
              <td align="center">
                <button class="btn btn-primary"  onclick="eliminar('<?php echo $inpe->id?>')">eliminar</button>
                
                </td>
        </tr>
        <?php } ?>
       
    </tbody>
</table>
 
 </body>
 </html>