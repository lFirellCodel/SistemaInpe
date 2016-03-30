<?php
    require_once './config.php';
    $lista = InpeDAO::listar();
    //var_dump($lista);
    
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
            <td>Detalles</td>
            <td>Comsumo de Drogas</td>
            <td>Lugar Nacimiento</td>
            <td>Grado de instrucion</td>
            <td>Delito</td>
            <td>Estado Civil</td>
            <td>Ocupacion Actual</td>
            <td>Ocuapacion Anterior</td>
          
            <td></td>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista as $inpe){?>
        <tr>
            
            <td><?php echo $inpe->nombres?></td>
            <td><?php echo $inpe->fecha_nac?></td>
            <td><?php echo $inpe->lugar_nac?></td>
            <td><?php echo $inpe->grado_inst?></td>
            <td><?php echo $inpe->delito?></td>
            <td><?php echo $inpe->est_civil?></td>
            <td><?php echo $inpe->ocupa_act?></td>
            <td><?php echo $inpe->ocupa_ant?></td>
          
<!--            <th width="150">Fecha Registro</th>-->
            <td align="center">
                <button class="btn btn-primary"  onclick="eliminar('<?php echo $inpe->id?>')">eliminar</button>
                
                </td>
            
            
        </tr>
        <?php } ?>
        
     
    </tbody>
</table>
        
        <div id="reporte">
            <a href="inpe-exportar-excel.php" id="descarga-exel"class="btn btn-default icon-document" role="button">Reporte</a> 
            <a target="_blank" href="eventos.php" class="btn btn-danger">Exportar a PDF</a>
        </div>
         
        <form method="post" action="inpe-importar-excel.php" enctype="multipart/form-data">
                <fieldset>
                    <legend>Importar excel</legend>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="file" name="documento" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-default">Importar</button>
                           
                        </div>
                    </div>
                </fieldset>
            </form>
 </body>
 </html>
 
 
 
