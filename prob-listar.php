<?php
    require_once './config.php';
    $lista = ProblemaDAO::listar();
//   
//   var_dump($lista);
//    
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
            <td>Problema actual</td>
            <td>Especificar</td>
            
    
            <td></td>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista as $prob){

      ?>
         
        <tr>
            
            <td><?php echo $prob->problema_act?></td>
            <td><?php echo $prob->especifico?></td>
         
           
<!--            <th width="150">Fecha Registro</th>-->
            <td align="center">
                <button class="btn btn-primary"  onclick="eliminar('<?php echo $ante->id_pro?>')">eliminar</button>
                
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
