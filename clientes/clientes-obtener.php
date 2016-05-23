<?php
require_once './config.php';

$id = $_POST["id"];

$lista = ClientesDAO::obtener($id);

?>
        <table border="1" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <td>ID</td>
            <td>EMAIL</td>
            <td>PASSWORD</td>
            <td>NOMBRES</td>
            <td>APELLIDOS</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($lista as $cliente){  
            ?>
            <td><input type="hidden" name="id_edi" value="<?php echo $cliente->id?>"/></td>
            <td><input type="text" name="email_edi" value="<?php echo $cliente->email?>"/></td>
            <td><input type="text" name="password_edi"value="<?php echo $cliente->password?>"/></td>
            <td><input type="text" name="nombres_edi" value="<?php echo $cliente->nombres?>"/></td>
            <td><input type="text" name="apellidos_edi"value="<?php echo $cliente->apellidos?>"/></td>
            
            <td align="center"><img src="img/trash.png" onclick="editar()"/></td>
        <?php } ?>
    </tbody>
</table>

    