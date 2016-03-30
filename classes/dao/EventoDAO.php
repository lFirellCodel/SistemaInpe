<?php
class EventoDAO {
    
    public static function listar() {
        
        $lista = array();
        
        $con = Conexion::getConexion();
        
        $query = "SELECT * FROM eventos";
        
        $stmt = $con->prepare($query);
        $stmt->execute();
        
        while ($objeto = $stmt->fetchObject('Evento')){
            $lista[] = $objeto;
        }
        return $lista;
    }
    
    public static function registrar($event) {
        
        $con = Conexion::getConexion();
        
        $query = "INSERT INTO eventos(nomb_evento, lugar_evento, tipo_evento, precio_unit) "
                . "VALUES (:evento, :lugar, :tipo, :precio)";
       
        $stmt = $con->prepare($query);
        $stmt->bindParam(':evento', $event->nom_even);
        $stmt->bindParam(':lugar', $event->lugar_even);
        $stmt->bindParam(':tipo', $event->tipo_even);
        $stmt->bindParam(':precio', $event->precio_even);
        
        $stmt->execute();
        
    }
    
    public static function eliminar($id) {
        
        $query = "DELETE FROM eventos WHERE id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
    }
    
      public static function modificar($id) {
        $con = Conexion::getConexion();
        $query = "UPDATE eventos SET nomb_evento=:evento , lugar_evento=:lugar , tipo_evento=:tipo, precio_unit=:precio WHERE id=:id";
        
       
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':evento', $event->nom_even);
        $stmt->bindParam(':lugar', $event->lugar_even);
        $stmt->bindParam(':tipo', $event->tipo_even);
        $stmt->bindParam(':precio', $event->precio_even);
        
        $stmt->execute();
    }
     public static function buscar($dato){
         $lista = array();
         $con = Conexion::getConexion();
         $query = "SELECT * FROM eventos WHERE nomb_evento LIKE '%$dato%'";
         
         $stmt = $con->prepare($query);
         $stmt->execute();
         
         while ($objeto = $stmt->fetchObject('Evento')){
            $lista[] = $objeto;
        }
        return $lista;
     }
    
}
  