
<?php
    require_once './config.php';
    $lista = AntecedentesDAO::listarAnt();
   
    var_dump($lista);
    
?>