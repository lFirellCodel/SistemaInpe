<?php
    require_once './config.php';
    $lista = AntecedentesDAO::listar();
   
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
            <td>Antecedentes</td>
            <td>Comsumo de droga</td>
            <td>Edad del consumo</td>
            <td>Tipo de droga que consumio</td>
            <td>Presenta Tatuaje</td>
            <td>Motivo de Tatuaje</td>
            <td>Lugar de Tatuaje</td>
            <td>Presencia de cortes y cicatrices</td>
            <td>Causa del estigma</td>
          
            <td></td>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista as $ante){
      ?>
         
        <tr>
            
            <td><?php echo $ante->detalle?></td>
            <td><?php echo ($ante->com_droga == "0")?"SI":"NO" ?></td>
            <td><?php echo $ante->edad_com?></td>
            <td><?php echo $ante->tipo_com?></td>
            <td><?php echo ($ante->presen_tatu =="0")?"SI":"NO"?></td>
            <td><?php echo $ante->moti_tatu?></td>
            <td><?php echo $ante->lugar_tatu?></td>
            <td><?php echo ($ante->presen_corte=="0"?"SI":"NO")?></td>
            <td><?php echo $ante->causa_estig?></td>
           
<!--            <th width="150">Fecha Registro</th>-->
            <td align="center">
                <button class="btn btn-primary"  onclick="eliminar('<?php echo $ante->id_ant?>')">eliminar</button>
                
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
 
 
 