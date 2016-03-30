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
            //GRAFICA DE PASTEL
//            $(document).ready(function() {
//            var options = {
//                chart: {
//                    renderTo: 'container',
//                    plotBackgroundColor: null,
//                    plotBorderWidth: null,
//                    plotShadow: false
//                },
//                title: {
//                    text: 'Internos * Numnero de Ingresos'
//                },
//                tooltip: {
//                    formatter: function() {
//                        return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
//                    }
//                },
//                plotOptions: {
//                    pie: {
//                        allowPointSelect: true,
//                        cursor: 'pointer',
//                        depth: 35,
//                        dataLabels: {
//                            enabled: true,
//                            color: '#000000',
//                            connectorColor: '#000000',
//                            formatter: function() {
//                                return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
//                            }
//                        }
//                    }
//                },
//                               
//                series: [{
//                    type: 'pie',
//                    name: 'Internos vs Ingreos',
//                    data: []
//                }]
//            }
//            
//            $.getJSON("data.php", function(json) {
//                options.series[0].data = json;
//                chart = new Highcharts.Chart(options);
//            });   
//        });   
            $(function(){//onload
                 listar();   
            });
            
            function listar(){
                $('#inpe-tabla').load('inpe-listar.php');
            }
            function registrar_interno(){
                var nombres = $('input[name="nombres"]').val();
                var fecha_nac = $('input[name="fecha_nac"]').val();
                var lugar_nac = $('input[name="lugar_nac"]').val();
                var grado_ints = $('select[name="grado_ints"]').val();
                var delito = $('input[name="delito"]').val();
                var e_civil = $('select[name="e_civil"]').val();
                var ocup_ac = $('input[name="ocup_ac"]').val();
                var ocupa_an= $('input[name="ocupa_an"]').val();
                
                
//                console.log(email)
//                console.log(password)
//                console.log(nombres)
//                console.log(apellidos)

                $.post('inpe-registrar.php', {
                    'nombres': nombres,
                    'fecha_nac': fecha_nac,
                    
                    'lugar_nac': lugar_nac,
                    'grado_ints': grado_ints,
                    'delito': delito,
                    'e_civil': e_civil,
                    'ocup_ac': ocup_ac,
                    'ocupa_an': ocupa_an,
                    
                }, function(data){
                    console.log(data)
                    
                   if(data.type == 'error'){
                       $('#flash').addClass('error');
                   }else{
                       $('#flash').removeClass('error');
                   }
                    
                    $('#flash p').text(data.message);
                    $('#flash').fadeIn(); 
                    
                $('input[name="nombres"]').val("");
              	$('input[name="fecha_nac"]').val("");
               	$('input[name="num_ingreso"]').val("");
              	$('input[name="lugar_nac"]').val("");
               	$('input[name="grado_ints"]').val("");
           	$('input[name="delito"]').val("");
            	$('input[name="e_civil"]').val("");
            	$('input[name="ocup_ac"]').val("");
            	$('input[name="ocupa_an"]').val("");
                $('input[name="sit_juridica"]').val("");
                    
                    listar();
                    
                }, 'json');
                
                
            }
            
            
            
            function eliminar(id){
                
                if(confirm('¿Realmente desea eliminar?')){
                    $.post('inpe-eliminar.php', {'id': id}, function(data){
                        
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
            
            function buscar_inpe(){
                var dato = $('input[name="dato"]').val();
                
                 $.post('inpe-buscar.php',{
                     'dato': dato
                 }, function(data){
                    console.log(data)
                    
//                   if(data.type == 'error'){
//                       $('#flash').addClass('error');
//                   }else{
//                       $('#flash').removeClass('error');
//                   }
//                    
//                    $('#flash p').text(data.message);
//                    $('#flash').fadeIn();                
//                    listar();
                        $('#inpe-tabla').html(data);

                }, 'html');
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
        <div class="container-fluid" id="busca">
            <legend>Buscar</legend>
            <form id="busqueda" method="post" action="inpe-buscar.php"  class="navbar-form navbar-left" onsubmit="return false">
                <div class="form-group">
                    <input type="text" class="form-control" name="dato" placeholder="Buscar" style="position: relative; left: -15px;">
                    </div>
                    <button type="submit" class="btn btn-default" onclick="buscar_inpe()">Enviar</button>
            </form>
        
        </div>
        <div class="container-fluid">
            <form method="post" class="form_edi" action="inpe-registrar.php" onsubmit="return false">
                <fieldset>
                    <legend>Registro de eventos</legend>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Nombres y Apellidos</label>
                            <input type="text" name="nombres" id="nombre_edit" class="form-control" placeholder="Ingrese Nombre" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Edad</label>
                            <input type="text" name="fecha_nac" id="edad_edit" class="form-control" placeholder="año - mes -dia" required="">
                        </div>
                       
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Lugar Nacimient</label>
                            <input type="text" name="lugar_nac" id="lugar_edit"class="form-control" placeholder="ingrese lugar de nacimiento" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Grado de instrucion</label>
                            
                            <select class="form-control focus" name="grado_ints" id="grado_edit" required>
                                <option value="">Seleccione una opcion</option>   
                                <option value="primaria">Primaria</option>
                                <option value="secundaria">Secundaria</option>
                                <option value="tecnico">Tecnico</option>
                                <option value="superior">Superior</option>
                            </select>
                           
                        </div>
                        <div class="form-group col-md-4">
                            <label>Delito</label>
                            <input type="text" name="delito" class="form-control" id="delito_edit" placeholder="Ingrese Delito" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Estado Civil</label>
                            <select class="form-control focus" name="e_civil" id="civil_edit"required>
                            <option value="">Seleccione una opcion</option>    
                            <option value="soltero">Soltero</option>
                            <option value="casado">Casado</option>
                            <option value="conviviente">Conviviente</option>
                          </select>
                            
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ocupacion Actual</label>
                            <input type="text" name="ocup_ac" class="form-control" id="oac_edit" placeholder="Ocupacion Actual" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ocuapacion Anterior</label>
                            <input type="text" name="ocupa_an" class="form-control" id="oan_edit"placeholder="Ocuapacion Anterior" required>
                        </div>
                       
                    </div>
                    <button id="btn_update" data-id="" data-nom="" data-edad="" data-ing="" data-lug="" data-grad="" data-del="" data-civ="" data-oac="" data-oan="" data-jur="" class="btn btn-success" onclick="update_inpe()" >ActualizarbyJeremy</button>
                    <button type="submit" class="btn btn-default" onclick="registrar_interno()">Registrar</button>
                    
                </fieldset>
            </form>
            
            <div id="flash" style="display: none">
                <p>texto</p>
                <button onclick="cerrar_flash()" class="btn">Cerrar</button>
            </div>
            
            <legend>Lista de Datos</legend>
            <div id="inpe-tabla">Cargando ...</div>
            
            <h2>Resultados</h2>
             <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
            <div id="caja1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            
        </div>
         <?php require_once './include/footer.php';?>
    </body>
</html>
