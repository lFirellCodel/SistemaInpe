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
            $( "input[name='com_drogas']:radio").change(function(){
                if($(this).val()==0){
                    $('#tipo').show();
                     $('#inicio').show()();
                 }else{
                    $('#tipo').hide();  
                    $('#inicio').hide();
                }
                
               
               });   
               
               $( "input[name='presen_tatu']:radio").change(function(){
                if($(this).val()==0){
                    $('#tatu').show();
                     $('#moti').show();
                 }else{
                    $('#tatu').hide();  
                    $('#moti').hide();
                }
                
               
               }); 
               
                $( "input[name='presen_corte']:radio").change(function(){
                if($(this).val()==0){
                    $('#estig').show();
                     
                 }else{
                    $('#estig').hide();  
                    
                }
                }); 
               
               });          
   
            $(function(){//onload
                 listar();   
            });
            
            function listar(){
                $('#inpe-tabla').load('ante-listar.php');
            }
            function registrar_ante(){
                var detalles = $("input[name='detalle[]']:checked").map(function () {
                    return this.value;
                   }).get();
                var motivos =$("input[name='moti_tatu[]']:checked").map(function () {
                    return this.value;
                   }).get();
               var estigmas = $("input[name='causa_estig[]']:checked").map(function () {
                    return this.value;
                   }).get();
                   
                var com_drogas = $('input:radio[name=com_drogas]:checked').val();
                var edad_com = $('select[name="edad_com"]').val();
                var tipo_com = $('select[name="tipo_com"]').val();
                var presen_tatu = $('input:radio[name=presen_tatu]:checked').val();
                var lugar_tatu = $('input[name="lugar_tatu"]:checked').val();
                var presen_corte = $('input:radio[name=presen_corte]:checked').val();

                $.post('ante-registrar.php', {
                    'detalle': detalles,
                    'com_drogas': com_drogas,
                    'edad_com': edad_com,
                    'tipo_com': tipo_com,
                    'presen_tatu': presen_tatu,
                    'lugar_tatu': lugar_tatu,
                    'moti_tatu': motivos,
                    'causa_estig': estigmas,
                    'presen_corte':presen_corte
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
                    $.post('ante-eliminar.php', {'id': id}, function(data){
                        
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
            <form method="post" class="form_edi" action="ante-registrar.php" onsubmit="return false">
                <fieldset>
                    <legend>Registro de antecedentes</legend>

                    <div class="row">
                        <div class="form-group col-md-4 ">
                            <label>Detalles</label><br>
                            <input type="checkbox"  value="ing_hogar_men"    name="detalle[]">:Ingr. hogar de menores<br>
                            <input type="checkbox"  value="ing_alvergues"    name="detalle[]">:Ingr. A Albergues<br>
                            <input type="checkbox"  value="ant_fam_pen"      name="detalle[]">:Ant. Fam. Penales<br>
                            <input type="checkbox"  value="ant_fam_psi"      name="detalle[]">:Ant. Fam. Psiquiatricos
                        </div>
                         
                   
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>comsumo de drogas</label><br>
                            <input type="radio" name="com_drogas" value="0" />SI<br>
                            <input type="radio" name="com_drogas"  value="1"  />NO
        
                        </div>
                        <div class="form-group col-md-4" id="tipo" style="display:none">
                            <label>Tipo de Drogas de Consumo</label><br>
                            <select class="form-control focus" name="tipo_com" id="grado_edit" required>
                                <option value="no consume">Seleccione una opcion</option>
                                <option value="marihuana">Marihuana</option>
                                <option value="pbc">PBC</option>
                                <option value="clorhidrato">Clorhidrato de C</option>
                                <option value="extasis">Éxtasis</option>
                                <option value="inhalantes">"Inhalantes"</option>
                                <option value="otros">OTROS</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4" id="inicio" style="display:none">
                            <label>Edad de Inicio de Consumo</label><br>
                            
                            <select class="form-control focus" name="edad_com" id="grado_edit" required>
                                <option value="No consume">Seleccione una opcion</option>
                                <option value="0a12">0-12 años</option>
                                <option value="12a18">12 a 18 años</option>
                                <option value="18a25">18 a 25 años</option>
                                <option value="25a40">25 a 40 años</option>
                                <option value="40amas">40 a más años</option>
                            </select>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                       <div class="form-group col-md-4">
                           <label>Presencia de tatuajes </label><br>
                            <input type="radio" name="presen_tatu" value="0" />SI<br>
                            <input type="radio" name="presen_tatu"  value="1"  />NO 
                           
                        </div>
                        
                        <div class="form-group col-md-4" id="tatu" style="display:none">
                            <label>Donde hizo el Tatuaje</label><br>
                            <input type="radio" name="lugar_tatu" value="intramuros"> intramuros<br>
                            <input type="radio" name="lugar_tatu" value="extramuros"> extramuros
                        </div>
                        
                        <div class="form-group col-md-4" id="moti" style="display:none">
                             <label>Motivos</label><br>
                            <input type="checkbox"  value="intruccionales" name="moti_tatu[]">:Motivos instrucionales<br>
                            <input type="checkbox"  value="misticos"       name="moti_tatu[]">:Motivos Misticos<br>
                            <input type="checkbox"  value="afectivos"      name="moti_tatu[]">:Motivos Afectivos<br>
                            <input type="checkbox"  value="agresivos"      name="moti_tatu[]">:Motivos Agresivos<br>
                            <input type="checkbox"  value="naturales"      name="moti_tatu[]">:Motivos Naturales<br>
                            <input type="checkbox"  value="agresivos"      name="moti_tatu[]">:Motivos identificacion organizacional
                        </div>
                  
                    </div>  
                    
                    <div class="row">
                         <div class="form-group col-md-4">
                           <label>Presencia de  y Cortes </label><br>
                            <input type="radio" name="presen_corte" value="0" />SI<br>
                            <input type="radio" name="presen_corte"  value="1"  />NO 
                           
                        </div>
                        
                         <div class="form-group col-md-4" id="estig" style="display:none" >
                            <label>Causa Estigmas</label><br>
                            <input type="checkbox"  value="accidentes"    name="causa_estig[]">:Accidentes <br>
                            <input type="checkbox"  value="quirurgica"    name="causa_estig[]">:Inter. Quirurgica<br>
                            <input type="checkbox"  value="vidadelecitiva"    name="causa_estig[]">:Vida Delectiva<br>
                            <input type="checkbox"  value="promodelo"    name="causa_estig[]">:Proseguir un Modelo<br>
                            <input type="checkbox"  value="pormoda"    name="causa_estig[]">:Por moda
                        </div>
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
            
<!--            <h2>Resultados</h2>
             <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
            <div id="caja1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>-->
            
        </div>
         <?php require_once './include/footer.php';?>
    </body>
</html>

