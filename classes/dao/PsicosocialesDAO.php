<?php
class PsicosocialesDAO {
    
    public static function listar() {
        
        $lista = array();
        
        $con = Conexion::getConexion();
        
        $query = "SELECT * FROM psicosociales_ambientales";
        
        $stmt = $con->prepare($query);
        $stmt->execute();
        
        while ($objeto = $stmt->fetchObject('Psicosocial')){
            $lista[] = $objeto;
        }
        return $lista;
    }
    
     public static function registrar($psico) {
        
        $con = Conexion::getConexion();
        
          $query = "INSERT INTO psicosociales_ambientales (con_delictiva, tipo_fam, tipo_criam, apoyo_fam, enfer_padece) "
                . "VALUES (:con_delictiva, :tipo_fam, :tipo_criam, :apoyo_fam, :enfer_padece)";
       
        $stmt = $con->prepare($query);
        $stmt->bindParam(':con_delictiva', $psico->con_delictiva);
        $stmt->bindParam(':tipo_fam', $psico->tipo_fam);
        $stmt->bindParam(':tipo_criam', $psico->tipo_criam);
        $stmt->bindParam(':apoyo_fam', $psico->apoyo_fam);
        $stmt->bindParam(':enfer_padece', $psico->enfer_padece);
        $stmt->execute();
        
        
    }
    public static function eliminar($id) {
        
        $query = "DELETE FROM psicosociales_ambientales WHERE id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
    }
}