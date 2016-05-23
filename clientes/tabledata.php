<?php
require_once './config.php';

$lista = ClientesDAO::listar();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        
        <!-- https://www.datatables.net/manual/installation -->
        
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.css">
  
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.js"></script>
        
        <script type="text/javascript">
            $(function(){
                $('#clientes-tabla').DataTable();
            });
        </script>
        <style type="text/css">
            
        </style>
    </head>
    <body>
        
        <table border="1" id="clientes-tabla" class="display">
            <thead>
                <th>ID</th>
                <th>EMAIL</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
            </thead>
            <tbody>
                <?php for($i=0; $i<100; $i++){?>
                <?php foreach ($lista as $cliente){?>
                <tr>
                    <td><?php echo $cliente->id?></td>
                    <td><?php echo $cliente->email?></td>
                    <td><?php echo $cliente->nombres?></td>
                    <td><?php echo $cliente->apellidos?></td>
                </tr>
                <?php } ?>
                <?php } ?>
            </tbody>
        </table>
        
    </body>
</html>
