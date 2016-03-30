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
            $('document').ready(function(){
            $( "input[name='act_trata']:radio").change(function(){
                if($(this).val()==1){
                    $('#tratmiento').show();
                     $('#motivo').hide();
                 }else{
                    $('#tratmiento').hide();  
                    $('#motivo').show();
                }
               });                 
               });          

            $(function(){//onload
                 listar();   
            });
            
            function listar(){
                $('#inpe-tabla').load('trata-listar.php');
            }
            function registrar_ante(){
                var participa = $('input:radio[name=act_trata]:checked').val();
                
                var tratamiento = $("input[name='tratamiento[]']:checked").map(function () {
                return this.value;
                   }).get();
                var motivo = $("input[name='motivo[]']:checked").map(function () {
                return this.value;
                   }).get();
        
            
               console.log(participa);
               console.log(tratamiento);
               console.log(motivo);
                

                $.post('trata-registrar.php', {
                    'participa': participa,
                    'tratamiento': tratamiento,
                    'motivo':motivo
                   
                    
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
                    $.post('trata-eliminar.php', {'id': id}, function(data){
                        
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
            <form method="post" class="form_edi" action="ante-registrar.php" onsubmit="return false">
                <fieldset>
                    <legend>Registro de antecedentes</legend>
                    <div class="form-group col-md-4" id="trata_tipo">
                            <label>Participa Actividades de Tratamiento</label><br>
                            <input type="radio" name="act_trata" value="1" />SI<br>
                            <input type="radio" name="act_trata"  value="2"/>NO
        
                        </div>
                    
                    <div class="row">
                        <div class="form-group col-md-4 " id="tratmiento" style="display:none">
                            <label>Actividades de Tratamiento</label><br>
                            <input type="checkbox"  value="Para accseder Beneficion peniten"    name="tratamiento[]">:Para acceder a bebeficios penitenciarios<br>
                            <input type="checkbox"  value="Para cambiar conducta"    name="tratamiento[]">:Para cambiar su conducta<br>
                            <input type="checkbox"  value="Para no se trasladado"      name="tratamiento[]">:Para no ser trasladado del penal<br>
                            <input type="checkbox"  value="otros"      name="tratamiento[]">:otros
                        </div>
                      
                    
                    
                    <div class="row">
                        <div class="form-group col-md-4" id="motivo" style="display:none">
                             <label>Motivo por que No Participa</label><br>
                            <input type="checkbox"  value="Penas Altas" name="motivo[]">:Tiene penas altas <br>
                            <input type="checkbox"  value="Penas Bajas"       name="motivo[]">:Tiene penas cortas <br>
                            <input type="checkbox"  value="No Tiene Acceso Benefi"      name="motivo[]">:No tiene acceso a beneficios<br>
                            <input type="checkbox"  value="No Tiene Apoyo Fam"      name="motivo[]">:No tiene apoyo familiar<br>
                            <input type="checkbox"  value="No tiene Info"      name="motivo[]">:No tiene mayor informacion<br>
                            <input type="checkbox"  value="No tiene Tiempo"      name="motivo[]">:No tiene tiempo pro trabajar<br>
                             <input type="checkbox"  value="No Inscrito"      name="motivo[]">:No se inscribio oportunamente<br>
                            
                        </div>
                    
                </fieldset>
                
                  <button type="submit" class="btn btn-default" onclick="registrar_ante()">Registrar</button>
            </form>
            
            <div id="flash" style="display: none">
                <p>texto</p>
                <button onclick="cerrar_flash()" class="btn">Cerrar</button>
            </div>
            
            <legend>Lista de Datos</legend>
            <div id="inpe-tabla">Cargando ...</div>
<!--            
            <h2>Resultados</h2>
             <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
            <div id="caja1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>-->
            
        </div>
         <?php require_once './include/footer.php';?>
    </body>
</html>

