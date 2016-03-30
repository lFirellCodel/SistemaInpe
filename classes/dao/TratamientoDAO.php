<?php
class TratamientoDAO {
    
    public static function listar() {
        
        $lista = array();
        
        $con = Conexion::getConexion();
        
        $query = "SELECT * FROM tratamiento";
        
        $stmt = $con->prepare($query);
        $stmt->execute();
        
        while ($objeto = $stmt->fetchObject('Tratamiento')){
            $lista[] = $objeto;
        }
        return $lista;
    }
    
     public static function registrar($trata) {
        
        $con = Conexion::getConexion();
        
        $query = "INSERT INTO tratamiento (participa_trata, tratamiento, motivo) "
                . "VALUES (:participa_trata, :tratamiento, :motivo)";
       
        $stmt = $con->prepare($query);
        $stmt->bindParam(':participa_trata', $trata->participa_trata);
        $stmt->bindParam(':tratamiento', $trata->tratamiento);
        $stmt->bindParam(':motivo', $trata->motivo);
        $stmt->execute();
        
    }
    public static function actualizar($trata) {
        
        $query = "UPDATE tratamiento SET participa_trata=:participa_trata, tratamiento=:tratamiento, motivo=:motivo"
                . "WHERE id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':participa_trata', $trata->participa_trata);
        $stmt->bindParam(':tratamiento', $trata->tratamiento);
        $stmt->bindParam(':motivo', $trata->motivo);
        $stmt->bindParam(':id', $trata->id);
        
        $stmt->execute();
    }
    
    public static function eliminar($id) {
        
        $query = "DELETE FROM tratamiento WHERE id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
    }
    public static function obtener($id) {
        $lista = array();
         
        $sql = "SELECT * FROM tratamiento WHERE id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        while($objeto = $stmt->fetchObject('Tratamiento')){
             $lista[] = $objeto;
        }
        
        return $lista;
    }
}