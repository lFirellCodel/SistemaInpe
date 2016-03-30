<?php

class AntecedentesDAO {
    
    public static function listar() {
        
        $lista = array();
        
        $con = Conexion::getConexion();
        
        $query = "SELECT * FROM antecedentes";
        
        $stmt = $con->prepare($query);
        $stmt->execute();
        
        while ($objeto = $stmt->fetchObject('Inpe')){
            $lista[] = $objeto;
        }
        return $lista;
    }
    
     public static function registrar($ante) {
        
        $con = Conexion::getConexion();
        
        $query = "INSERT INTO antecedentes (detalle, com_droga, edad_com, tipo_com, presen_tatu, moti_tatu, causa_estig, lugar_tatu, presen_corte) "
                . "VALUES (:detalle, :com_droga, :edad_com, :tipo_com, :presen_tatu, :moti_tatu, :causa_estig, :lugar_tatu, :presen_corte)";
       
        $stmt = $con->prepare($query);
        $stmt->bindParam(':detalle', $ante->detalle);
        $stmt->bindParam(':com_droga', $ante->com_droga);
        $stmt->bindParam(':edad_com', $ante->edad_com);
        $stmt->bindParam(':tipo_com', $ante->tipo_com);
        $stmt->bindParam(':presen_tatu', $ante->presen_tatu);
        $stmt->bindParam(':moti_tatu', $ante->moti_tatu);
        $stmt->bindParam(':causa_estig', $ante->causa_estig);
        $stmt->bindParam(':lugar_tatu', $ante->lugar_tatu);
         $stmt->bindParam(':presen_corte', $ante->presen_corte);
        $stmt->execute();
        
    }
    public static function eliminar($id) {
        
        $query = "DELETE FROM antecedentes WHERE id_ant=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
    }
    public static function listarAnt() {
        
        $lista = array();
        
        $con = Conexion::getConexion();
        
        $query = "SELECT * FROM antecedentes INNER JOIN internos ";

        $stmt = $con->prepare($query);
        $stmt->execute();
        
        while ($objeto = $stmt->fetchObject('Inpe')){
            $lista[] = $objeto;
        }
        return $lista;
    }

}


