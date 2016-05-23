<?php
    require_once './config.php';
    $lista = ClientesDAO::listar();
    
?>
<table border="1" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <td>ID</td>
            <td>EMAIL</td>
            <td>NOMBRES</td>
            <td>APELLIDOS</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista as $cliente){?>
        <tr>
            <td><?php echo $cliente->id?></td>
            <td><?php echo $cliente->email?></td>
            <td><?php echo $cliente->nombres?></td>
            <td><?php echo $cliente->apellidos?></td>
            <td align="center"><img src="img/trash.png" onclick="eliminar('<?php echo $cliente->id?>')"/></td>
            <td align="center"><img src="img/trash.png" onclick="obtener('<?php echo $cliente->id?>')"/></td>
        </tr>
        <?php } ?>
    </tbody>
</table>