<?php
require_once './config.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>


        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>-->
        <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
        <!--        Seccion de grafica-->
        
        
        <script src="lib/Highcharts-4.1.5/js/highcharts.js"></script>
        <script src="lib/Highcharts-4.1.5/js/modules/exporting.js"></script>
        <!-- Bootstrap -->
        <link href="https://fontastic.s3.amazonaws.com/S4oB3JzJncdU5ZEY34cesU/icons.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
         <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
        <!-- My custom style -->
        <link rel="stylesheet" href="style.css">    
        
        <script>
          
            $(function(){//onload
                 listar();   
            });
            
            function listar(){
                $('#inpe-tabla').load('prob-listar.php');
            }
            function registrar_des(){
                var problema = $("input[name='problema[]']:checked").map(function () {
                return this.value;
                   }).get();
                var desorden = $("input[name='desorden[]']:checked").map(function () {
                return this.value;
                   }).get();
                var especificar = $('#caja').val();
      

                $.post('prob-registro.php', {
                    'problema': problema,
                    'desorden':desorden,
                    'caja': especificar

                }, function(data){
                    console.log(data)
                    
                   if(data.type == 'error'){
                       $('#flash').addClass('error');
                   }else{
                       $('#flash').removeClass('error');
                   }
                    
                    $('#flash p').text(data.message);
                    $('#flash').fadeIn(); 
                    
          
                    
                    listar();
                    
                }, 'json');
                
                
            }
            function eliminar(id){
                
                if(confirm('¿Realmente desea eliminar?')){
                    $.post('prob-eliminar.php', {'id': id}, function(data){
                        
                        if(data.type == 'error'){
                            $('#flash').addClass('error');
                        }else{
                            $('#flash').removeClass('error');
                        }

                         $('#flash p').text(data.message);
                         $('#flash').fadeIn(); 
                        
                        listar();
                        
                    }, 'json');
                }
                
            }
             function obtener(id){
                 
                $.post('trata-obtener.php',{
                  'id': id
                }, function(data){
                  console.log(data)
                    

 
                }, 'json');
             }

             
              function cerrar_flash(){
                $('#flash').fadeOut();
            }

        </script>
        <style type="text/css">
            #clientes-tabla{
                border: 1px solid cadetblue;
            }
        </style>
    </head>
    <body>
        <?php require_once './include/header.php';?>
        <?php require_once './include/menubar.php';?>
        <div class="container-fluid">
            <form method="post" class="form_edi" action="prob-registro.php" onsubmit="return false">
                <fieldset>
                    <legend>Registro de Problemas</legend>
                  <div class="row">
                        <div class="form-group col-md-6" id="motivo" >
                             <label>Problema actual</label><br>
                            <input type="checkbox"  value="Dificultades con la pareja" name="problema[]">:Dificultades con la pareja<br>
                            <input type="checkbox"  value="Dificultades con los hijos"       name="problema[]">:Dificultades con los hijos <br>
                            <input type="checkbox"  value="Dificultades con la familia"      name="problema[]">:Dificultades con la familia<br>
                            <input type="checkbox"  value="Problema relativos al ambiente social"  name="problema[]">:Problema relativos al ambiente social<br>
                            <input type="checkbox"  value="Problemas relativos a la enseñanza"      name="problema[]">:Problemas relativos a la enseñanza<br>
                            <input type="checkbox"  value="Problemas laborales"      name="problema[]">:Problemas laborales<br>
                            <input type="checkbox"  value="Problemas de espacio para vivir"      name="problema[]">:Problemas de espacio para vivir<br>
                            <input type="checkbox"  value="Problemas economicos"      name="problema[]">:Problemas economicos<br>
                            <input type="checkbox"  value="Problemas de acceso a los servicios de asistencia sanitaria"      name="problema[]">:Problemas de acceso a los servicios de asistencia sanitaria<br>
                            <input type="checkbox"  value="Problemas relativos a la interaccion con el sistema legal"      name="problema[]">:Problemas relativos a la interaccion con el sistema legal<br>
                            <input type="checkbox"  value="Otros problemas psicosociales y ambientales"      name="problema[]">:Problemas de acceso a los servicios de asistencia sanitaria<br>
                       
                        </div>
                         <div class="form-group col-md-6">
                            <label >Especificar</label>
                            <textarea class="form-control" rows="3" name="especificar" id="caja"></textarea>
                          </div>
                         <div class="form-group col-md-6" id="motivo" >
                                <label>Desorden Emocial</label><br>
                            <input type="checkbox"  value="a nivel fisiologico" name="desorden[]">:Dificultades con la pareja<br>
                            <input type="checkbox"  value="a nivel emocional"       name="desorden[]">:Dificultades con los hijos <br>
                            <input type="checkbox"  value="a nivel motor movimiento"      name="desorden[]">:Dificultades con la familia<br>
                            <input type="checkbox"  value="a nivel social"      name="desorden[]">:Dificultades con la familia<br>
                            <input type="checkbox"  value="a nivel cognitivo"      name="desorden[]">:Dificultades con la familia<br>
                         </div>
                </fieldset>
          
                  <button type="submit" class="btn btn-default" onclick="registrar_des()">Registrar</button>
            </form>
            
            <div id="flash" style="display: none">
                <p>texto</p>
                <button onclick="cerrar_flash()" class="btn">Cerrar</button>
            </div>
            
            <legend>Lista de Datos</legend>
            <div id="inpe-tabla">Cargando ...</div>
            
<!--            <h2>Resultados</h2>
             <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
            <div id="caja1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>-->
            
        </div>
         <?php require_once './include/footer.php';?>
    </body>
</html>
