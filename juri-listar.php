<?php
    require_once './config.php';
    $lista = JuridicaDAO::listar();
   
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
            <td>Estado</td>
            <td>Delito</td>
            <td>NºAños</td>
            <td>NºIngresos</td>
            <td>Tipo de Delito</td>
            <td>Fecha de Ingreso</td>
            <td>Fecha de Ingreso</td>
            <td>Pabellón Clasificado</td>
          
            <td></td>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista as $juri){

      ?>
         
        <tr>
            
            <td><?php echo ($juri->estado == "0")?"P":"S" ?></td>
            <td><?php echo $juri->delito?></td>
            <td><?php echo $juri->num_anos?></td>
            <td><?php echo $juri->num_ingresos?></td>
            <td><?php echo $juri->tipo_delito?></td>
            <td><?php echo $juri->fecha_ingre?></td>
            <td><?php echo $juri->pab_actual?></td>
            <td><?php echo $juri->pab_clasificado?></td>
           
<!--            <th width="150">Fecha Registro</th>-->
            <td align="center">
                <button class="btn btn-primary"  onclick="eliminar('<?php echo $juri->id_juri?>')">eliminar</button>
                
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
 
 
 