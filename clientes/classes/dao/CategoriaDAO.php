<?php

class CategoriaDAO {
    
    public static function listar() {
        $lista = array();
        $query = "SELECT * FROM categorias ORDER BY nombre";
        $con = Conexion::getConexion() ;
        $stmt = $con->prepare($query);
        $stmt->execute();

        while($fila = $stmt->fetchObject('Categoria')){
            $lista[] = $fila;
        }

        return $lista;
    }
        
}

?>
