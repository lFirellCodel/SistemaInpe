<?php
    require_once './config.php';
    $lista = PsicosocialesDAO::listar();
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
            <td>Conducta delictiva</td>
            <td>Apoyo familiar</td>
            <td>Tipo de familia</td>
            <td>Tipo de crianza</td>
            <td>Enfermedad que padese</td>
    
            <td></td>   
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista as $psico){
            
          $combo1 = "Cuenta con apoyo".$psico->apoyo_fam;
                
        
      ?>
         
        <tr>
            
            <td><?php echo $psico->con_delictiva?></td>
            <td><?php echo $combo1 ?></td>
            <td><?php echo $psico->tipo_fam?></td>
            <td><?php echo $psico->tipo_criam?></td>
            <td><?php echo $psico->enfer_padece?></td>
         
           
<!--            <th width="150">Fecha Registro</th>-->
            <td align="center">
                <button class="btn btn-primary"  onclick="eliminar('<?php echo $psico->id?>')">eliminar</button>
                
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
