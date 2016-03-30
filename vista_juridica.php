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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
            $(function(){
                $('#datepicker').datepicker({dateFormat : 'yy-mm-dd'});
            });
            
            $(function(){//onload
                 listar();   
            });
            
            function listar(){
                $('#inpe-tabla').load('juri-listar.php');
            }
            
            function registrar_juri(){
                var estado = $('input:radio[name=estado]:checked').val();
                var delito = $('input[name="delito"]').val();
                var num_anos = $('input[name="num_anos"]').val();
                var num_ingresos = $('input[name="num_ingresos"]').val();
                var tipo_delito = $('input[name="tipo_delito"]').val();
                var fecha_ingre = $('input[name="fecha_ingre"]').val();
                var pab_actual = $('input[name="pab_actual"]').val();
                var pab_clasificado = $('input[name="pab_clasificado"]').val();
              
              
                  
//                console.log(email)
//                console.log(password)
//                console.log(nombres)
//                console.log(apellidos)

                $.post('juri-registrar.php', {
                    'estado': estado,
                    'delito': delito,
                    'num_anos': num_anos,
                    'num_ingresos': num_ingresos,
                    'tipo_delito': tipo_delito,
                    'fecha_ingre': fecha_ingre,
                    'pab_actual': pab_actual,
                    'pab_clasificado': pab_clasificado
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
                    $.post('juri-eliminar.php', {'id': id}, function(data){
                        
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
            <form method="post" class="form_edi" action="juri-registrar.php" onsubmit="return false">
                <fieldset>
                    <legend>Registro Juridico</legend>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Estado</label><br>
                            <input type="radio" name="estado" value="0" />P<br>
                            <input type="radio" name="estado"  value="1"  />S
                        </div>
                        <div class="form-group col-md-4">
                            <label>Delito</label>
                            <input type="text" name="delito" id="ingreso_edit" class="form-control" placeholder="Ingrese delito" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>NºAños</label>
                            <input type="text" name="num_anos" id="ingreso_edit" class="form-control" placeholder="Ingrese NºAños" required>
                        </div>
                         <div class="form-group col-md-4">
                            <label>NºIngresos</label>
                            <input type="text" name="num_ingresos" id="ingreso_edit" class="form-control" placeholder="Ingrese NºIngresos" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Tipo de Delito</label>
                            <input type="text" name="tipo_delito" id="nombre_edit" class="form-control" placeholder="Ingrese tipo de delito" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Fecha de Ingreso</label>
                            <input type="text" id="datepicker" name="fecha_ingre" >
                        </div>
                        <div class="form-group col-md-4">
                            <label>Pabellón Actual</label>
                            <input type="text" name="pab_actual" id="ingreso_edit" class="form-control" placeholder="Ingrese pabellon actual" required>
                        </div>
                         <div class="form-group col-md-4">
                            <label>Pabellón Clasificado</label>
                            <input type="text" name="pab_clasificado" id="ingreso_edit" class="form-control" placeholder="Ingrese pabellon clasificado" required>
                        </div>
                    </div>
                    
                </fieldset>

                  <button type="submit" class="btn btn-default" onclick="registrar_juri()">Registrar</button>
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
