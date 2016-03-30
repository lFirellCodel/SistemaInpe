<?php

class JuridicaDAO {
    
    public static function listar() {
        
        $lista = array();
        
        $con = Conexion::getConexion();
        
        $query = "SELECT * FROM juridica";
        
        $stmt = $con->prepare($query);
        $stmt->execute();
        
        while ($objeto = $stmt->fetchObject('Juridica')){
            $lista[] = $objeto;
        }
        return $lista;
    }
    
     public static function registrar($juri) {
        
        $con = Conexion::getConexion();
        
        $query = "INSERT INTO juridica (num_anos, fecha_ingre, delito, tipo_delito, pab_actual, pab_clasificado, estado, num_ingresos) "
                . "VALUES (:num_anos, :fecha_ingre, :delito, :tipo_delito, :pab_actual, :pab_clasificado, :estado, :num_ingresos)";
       
        $stmt = $con->prepare($query);
        $stmt->bindParam(':num_anos',$juri->num_anos);
        $stmt->bindParam(':fecha_ingre',$juri->fecha_ingre);
        $stmt->bindParam(':delito', $juri->delito);
        $stmt->bindParam(':tipo_delito',$juri->tipo_delito);
        $stmt->bindParam(':pab_actual', $juri->pab_actual);
        $stmt->bindParam(':pab_clasificado', $juri->pab_clasificado);
        $stmt->bindParam(':estado', $juri->estado);
        $stmt->bindParam(':num_ingresos', $juri->num_ingresos);
        $stmt->execute();
        
    }
    public static function eliminar($id){
        $con = Conexion::getConexion();
        
        $query = "DELETE FROM juridica WHERE id_juri=:id";
        
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
        
                
    }

}