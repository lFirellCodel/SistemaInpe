<?php
class InpeDAO {
    
    public static function listar() {
        
        $lista = array();
        
        $con = Conexion::getConexion();
        
        $query = "SELECT * FROM internos";
        
        $stmt = $con->prepare($query);
        $stmt->execute();
        
        while ($objeto = $stmt->fetchObject('Inpe')){
            $lista[] = $objeto;
        }
        return $lista;
    }
    public static function registrar($inpe) {
        
        $con = Conexion::getConexion();
        
        $query = "INSERT INTO internos(nombres, fecha_nac, lugar_nac, grado_inst, delito, est_civil, ocupa_act, ocupa_ant) "
                . "VALUES (:nombres, :fecha_nac, :lugar_nac, :grado_inst, :delito, :est_civil, :ocupa_act, :ocupa_ant)";
       
        $stmt = $con->prepare($query);
        $stmt->bindParam(':nombres', $inpe->nombres);
        $stmt->bindParam(':fecha_nac', $inpe->fecha_nac);
        $stmt->bindParam(':lugar_nac', $inpe->lugar_nac);
        $stmt->bindParam(':grado_inst', $inpe->grado_inst);
        $stmt->bindParam(':delito', $inpe->delito);
        $stmt->bindParam(':est_civil', $inpe->est_civil);
        $stmt->bindParam(':ocupa_act', $inpe->ocupa_act);
        $stmt->bindParam(':ocupa_ant', $inpe->ocupa_ant);
      
        $stmt->execute();
        
    }
    public static function eliminar($id) {
        
        $query = "DELETE FROM internos WHERE id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
    }
    public static function buscar($dato){
         $lista = array();
         $con = Conexion::getConexion();
         $query = "SELECT * FROM internos WHERE nombres LIKE '%$dato%'";
         
         $stmt = $con->prepare($query);
         $stmt->execute();
         
         while ($objeto = $stmt->fetchObject('Inpe')){
            $lista[] = $objeto;
        }
        return $lista;
    }
    
     public static function obtener($id) {
        $lista = array();
         
        $sql = "SELECT * FROM internos WHERE id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        while($objeto = $stmt->fetchObject('Inpe')){
             $lista[] = $objeto;
        }
        
        return $lista;
    }
    public static function update($inpe){

        $query = "UPDATE internos SET nombres = '$inpe->nombres' , fecha_nac = '$inpe->fecha_nac' , num_ingreso= '$inpe->num_ingreso' , lugar_nac='$inpe->lugar_nac', grado_inst='$inpe->grado_inst' , delito='$inpe->delito', est_civil='$inpe->est_civil', ocupa_act='$inpe->ocupa_act', ocupa_ant='$inpe->ocupa_ant' , sit_juridica='$inpe->sit_juridica'   WHERE id= $inpe->id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($query); 


//        $stmt->bindParam(':lat', $mapa->lat);
//        $stmt->bindParam(':lng', $mapa->lng);
//        $stmt->bindParam(':direc', $mapa->direc);
//        $stmt->bindParam(':edif', $mapa->edif);
//        $stmt->bindParam(':id', $mapa->id);
        
        $result = $stmt->execute();

        return $result;

    }
}