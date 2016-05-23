<?php

class ClientesDAO {
    
    public static function listar() {
        
        $lista = array();
        
        $con = Conexion::getConexion();
        
        $query = "SELECT c.id, email, nombres, apellidos, sexo, nacimiento, direccion, 
            c.distritos_id, d.nombre AS distritos_nombre, d.provincias_id, p.nombre AS provincias_nombre, p.departamentos_id, e.nombre AS departamentos_nombre 
            FROM clientes c 
            LEFT JOIN distritos d ON d.id=c.distritos_id 
            LEFT JOIN provincias p ON p.id=d.provincias_id 
            LEFT JOIN departamentos e ON e.id=p.departamentos_id 
            WHERE estado=1";
        
        $stmt = $con->prepare($query);
        $stmt->execute();
        
        while ($objeto = $stmt->fetchObject('Cliente')){
            $lista[] = $objeto;
        }
        return $lista;
    }
    
    public static function registrar($cliente) {
        
        $con = Conexion::getConexion();
        
        $query = "INSERT INTO clientes(email, `password`, nombres, apellidos, estado) "
                . "VALUES (:email, :password, :nombres, :apellidos, 1)";
        
        $stmt = $con->prepare($query);
        $stmt->bindParam(':email', $cliente->email);
        $stmt->bindParam(':password', $cliente->password);
        $stmt->bindParam(':nombres', $cliente->nombres);
        $stmt->bindParam(':apellidos', $cliente->apellidos);
        $stmt->execute();
        
    }
    
    public static function eliminar($id) {
        
        $query = "DELETE FROM clientes WHERE id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
    }
    public static function obtener($id) {
        $lista = array();
        
        $sql = "SELECT * FROM clientes WHERE id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
//      devuelve solo string        
//        if($objeto = $stmt->fetchObject('Cliente')){
//            return $objeto;
//        }
//        
//        return NULL;
//    }
        
          if($objeto = $stmt->fetchObject('Cliente')){
           $lista[] = $objeto;
        }
        
        return $lista;
    }
    
     public static function editar($cliente) {
     
        $query = "UPDATE clientes SET email=:email, password=:password, nombres=:nombres ,apellidos=:apellidos, estado=:estado WHERE id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':email', $cliente->email);
        $stmt->bindParam(':password', $cliente->password);
        $stmt->bindParam(':nombres', $cliente->nombres);
        $stmt->bindParam(':apellidos', $cliente->apellidos);
        $stmt->bindParam(':id', $cliente->id);
        $stmt->bindParam(':estado', $cliente->estado);
                
        $stmt->execute();
        
       
    }
    
    
}
