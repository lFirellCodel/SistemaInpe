<?php
class ProblemaDAO {
    
    public static function listar() {
        
        $lista = array();
        
        $con = Conexion::getConexion();
        
        $query = "SELECT * FROM problema";
        
        $stmt = $con->prepare($query);
        $stmt->execute();
        
        while ($objeto = $stmt->fetchObject('Problema')){
            $lista[] = $objeto;
        }
        return $lista;
    }
    
     public static function registrar($prob) {
        
        $con = Conexion::getConexion();
        
        $query = "INSERT INTO problema (problema_act, especifico, desor_emocional) "
                . "VALUES (:problema_act, :especifico, :desor_emocional)";
       
        $stmt = $con->prepare($query);
        $stmt->bindParam(':problema_act', $prob->problema_act);
        $stmt->bindParam(':especifico', $prob->especifico);	
        $stmt->bindParam(':desor_emocional', $prob->desor_emocional);
        $stmt->execute();
        
    }
  
    public static function eliminar($id) {
        
        $query = "DELETE FROM problema WHERE id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
    }
   
}