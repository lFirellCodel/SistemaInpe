<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>-->
        <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
        
        <!-- Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- My custom style -->
        <link rel="stylesheet" href="style.css">
        
        <script>
            $(function(){//onload
                listar();
            });
            
            function listar(){
                $('#clientes-tabla').load('clientes-listar.php');
            }
            
            function registrar(){
                var email = $('input[name="email"]').val();
                var password = $('input[name="clave"]').val();
                var nombres = $('input[name="nombres"]').val();
                var apellidos = $('input[name="apellidos"]').val();
                
//                console.log(email)
//                console.log(password)
//                console.log(nombres)
//                console.log(apellidos)

                $.post('clientes-registrar.php', {
                    'email': email,
                    'password': password,
                    'nombres': nombres,
                    'apellidos': apellidos
                }, function(data){
                    console.log(data)
                    
                   if(data.type == 'error'){
                       $('#flash').addClass('error');
                   }else{
                       $('#flash').removeClass('error');
                   }
                    
                    $('#flash p').text(data.message);
                    $('#flash').fadeIn(); 
                    
                    $('input[name="email"]').val('');
                    $('input[name="clave"]').val('');
                    $('input[name="nombres"]').val('');
                    $('input[name="apellidos"]').val('');
                    
                    listar();
                    
                }, 'json');
                
                
            }
            
            function eliminar(id){
                
                if(confirm('¿Realmente desea eliminar?')){
                    $.post('clientes-eliminar.php', {'id': id}, function(data){
                        
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
                
                if(confirm('¿Realmente desea editar?')){
                    $.post('clientes-obtener.php', {'id': id}, function(data){
                        console.log(data);

                       $('#clientes-tabla').html(data);
                        
                    }, 'html');
                }    
                
            }
            
            function editar(){
                var email = $('input[name="email_edi"]').val();
                var password = $('input[name="password_edi"]').val();
                var nombres = $('input[name="nombres_edi"]').val();
                var apellidos = $('input[name="apellidos_edi"]').val();
                var id = $('input[name="id_edi"]').val();
//                console.log(email)
//                console.log(password)
//                console.log(nombres)
//                console.log(apellidos)

                $.post('clientes-editar.php', {
                    'email': email,
                    'password': password,
                    'nombres': nombres,
                    'apellidos': apellidos,
                    'id':id
                }, function(data){
                    console.log(data)
                    
                   if(data.type == 'error'){
                       $('#flash').addClass('error');
                   }else{
                       $('#flash').removeClass('error');
                   }
                    
                    $('#flash p').text(data.message);
                    $('#flash').fadeIn(); 
                    
                    $('input[name="email"]').val('');
                    $('input[name="clave"]').val('');
                    $('input[name="nombres"]').val('');
                    $('input[name="apellidos"]').val('');
                    
                    listar();
                    
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
            
            <form method="post" action="clientes-registrar.php" onsubmit="return false">
                <fieldset>
                    <legend>Registro de clientes</legend>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Ingrese email">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Clave</label>
                            <input type="password" name="clave" class="form-control" placeholder="Ingrese password">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nombres</label>
                            <input type="text" name="nombres" class="form-control" placeholder="Ingrese nombres">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" placeholder="Ingrese apellidos">
                        </div>
                        
                    </div>

                    <button type="submit" class="btn btn-default" onclick="registrar()">Registrar</button>
                </fieldset>
            </form>
            
            <div id="flash" style="display: none">
                <p>texto</p>
                <button onclick="cerrar_flash()" class="btn">Cerrar</button>
            </div>
            
            <h2>Lista de Clientes</h2>
            <div id="clientes-tabla">Cargando ...</div>
            
   <!-- seccion modal editar cliente -->     
   
           
            </form>
            
        </div>
         <?php require_once './include/footer.php';?>
    </body>
</html>
