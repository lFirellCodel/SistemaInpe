<?php
    require_once './config.php';
    $lista = TratamientoDAO::listar();
   
//    var_dump($lista);
    
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
            <td>Participa en Actividades Tratamiento</td>
            <td>Motivo por que No Paticipa</td>
          
          
            <td></td>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista as $trata){
      ?>
         
        <tr>
            <td><?php echo ($trata->participa_trata == "1")?"SI":"NO" ?></td>
            <td><?php echo $trata->tratamiento ?></td>
            <td><?php echo $trata->motivo ?></td>
 
           
<!--            <th width="150">Fecha Registro</th>-->
            <td align="center">
                <button class="btn btn-primary"  onclick="eliminar('<?php echo $trata->id?>')">eliminar</button>
                 <button class="btn btn-primary"  onclick="obtener('<?php echo $trata->id?>')">editar</button>
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
 