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
                $('#inpe-tabla').load('psico-listar.php');
            }
            function registrar_psico(){
                  var apoyo =$("input[name='apoyo[]']:checked").map(function () {
                    return this.value;
                   }).get();
                   
                var factores =$("input[name='factores[]']:checked").map(function () {
                    return this.value;
                   }).get();
                   
             
                var tipo_fam = $('select[name="tipo_fam"]').val();
                var tipo_cri = $('select[name="tipo_cri"]').val();
                var enfermedad = $('input[name="enfer_padece"]').val();


                $.post('psico-registrar.php', {
                    'factores': factores,
                    'tipo_fam': tipo_fam,
                    'tipo_cri': tipo_cri,
                    'apoyo': apoyo,
                    'enfermedad': enfermedad
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
                    $.post('psico-eliminar.php', {'id': id}, function(data){
                        
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
            <form method="post" class="form_edi" action="psico-registrar.php" onsubmit="return false">
                <fieldset>
                    <legend>Registro Psicosial Ambiental</legend>

                    <div class="row">
                        <div class="form-group col-md-4 ">
                            <label>Factores que contribuyeron a la conducta delictiva</label><br>
                            <input type="checkbox"  value="inf. grupo de pares"    name="factores[]">:Influencia de grupo de pares<br>
                            <input type="checkbox"  value="comsu. de drogas ilegales "    name="factores[]">:Consumo de drogas ilegales <br>
                            <input type="checkbox"  value="falta de control emocional"      name="factores[]">:Falta de control emocional<br>
                            <input type="checkbox"  value="falta de habilidades sociales"      name="factores[]">:Falta de habilidades sociales<br> 
                            <input type="checkbox"  value="hist. familiar delictiva"    name="factores[]">:Historia familiar delictiva <br>
                            <input type="checkbox"  value="aban. moral y familiar"    name="factores[]">:Abandono moral y familiar<br>
                            <input type="checkbox"  value="fal. oportunidades laborales"    name="factores[]">:Falta de oportunidades laborales<br>
                        </div>
                       
                       
                       
                    </div>
                    
                    <div class="row">
                        
                        <div class="form-group col-md-4">
                            <label>Tipo de Famnilia</label><br>
                            <select class="form-control focus" name="tipo_fam" id="grado_edit" required>
                                <option value="">Seleccione una opcion</option>   
                                <option value="nuclear">Nuclear</option>
                                <option value="monoparenteal">Mono parental</option>
                                <option value="extendida">Extendida</option>
                                <option value="homoparental">Homo parental</option>
                                <option value="ensamblada">Ensamblada</option>
                                <option value="De Hecho">De hecho</option>
                                
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tipo de Crianza</label><br>
                            <select class="form-control focus" name="tipo_cri" id="grado_edit" required>
                                <option value="">Seleccione una opcion</option>   
                                <option value="autoritario">Autoritario</option>
                                <option value="permisibo">Permisivo</option>
                                <option value="negligente">Negligente</option>
                                <option value="democratico">Democratico</option>
                                <option value="religioso">Religioso</option>
                                <option value="otros">OTROS</option>
                            </select>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                       
                        <div class="form-group col-md-4">
                        
                             
                            <label>Detalles</label><br>
                            <input type="checkbox"  value="Padre o madre"    name="apoyo[]">:Padre o madre<br>
                            <input type="checkbox"  value="De su pareja "    name="apoyo[]">:De su pareja <br>
                            <input type="checkbox"  value="De su pareja"      name="apoyo[]">:De su pareja<br>
                            <input type="checkbox"  value="de sus hermanos"      name="apoyo[]">:de sus hermanos<br> 
                            <input type="checkbox"  value="otros familiares"    name="apoyo[]">:otros familiares <br>
                            <input type="checkbox"  value="amistades"    name="apoyo[]">:amistades<br>
                            
                        </div>
                      
                    </div>
                     <div class="form-group col-md-4">
                            <label>Enfermedad</label>
                            <input type="text" name="enfer_padece" id="ingreso_edit" class="form-control" placeholder="Ingrese enfermedad" required>
                        </div>
                    
                </fieldset>
                 
                  <button type="submit" class="btn btn-default" onclick="registrar_psico()">Registrar</button>
            </form>
            
            <div id="flash" style="display: none">
                <p>texto</p>
                <button onclick="cerrar_flash()" class="btn">Cerrar</button>
            </div>
            
            <legend>Lista de Datos</legend>
            <div id="inpe-tabla">Cargando ...</div>
            
<!--            <h2>Resultados</h2>
             <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
            <div id="caja1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            -->
        </div>
         <?php require_once './include/footer.php';?>
    </body>
</html>

