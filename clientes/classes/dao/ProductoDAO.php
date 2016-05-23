<?php

class ProductoDAO {
    
    public static function listar() {
        
        $lista = array();
        
        $sql = "SELECT p.id, p.nombre, p.categorias_id, c.nombre AS categorias_nombre, descripcion, precio, stock, imagen, imagen_tipo, imagen_tamanio, creado, estado
                FROM productos p
                INNER JOIN categorias c ON c.id=p.categorias_id
                WHERE estado=1";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        
        while($objeto = $stmt->fetchObject('Producto')){
            $lista[] = $objeto;
        }
        
        return $lista;
    }
    
    public static function obtener($id) {
        
        $sql = "SELECT p.id, p.nombre, p.categorias_id, c.nombre AS categorias_nombre, descripcion, precio, stock, imagen, imagen_tipo, imagen_tamanio, creado, estado
                FROM productos p
                INNER JOIN categorias c ON c.id=p.categorias_id
                WHERE estado=1 AND p.id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        if($objeto = $stmt->fetchObject('Producto')){
            return $objeto;
        }
        
        return NULL;
    }
    
    public static function registrar($producto) {
        
        $query = "INSERT INTO productos (categorias_id, nombre, descripcion, precio, stock, imagen, imagen_tipo, imagen_tamanio) "
                . "VALUES (:categorias_id, :nombre, :descripcion, :precio, :stock, :imagen, :imagen_tipo, :imagen_tamanio);";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':categorias_id', $producto->categorias_id);
        $stmt->bindParam(':nombre', $producto->nombre);
        $stmt->bindParam(':descripcion', $producto->descripcion);
        $stmt->bindParam(':precio', $producto->precio);
        $stmt->bindParam(':stock', $producto->stock);
        
        $stmt->bindParam(':imagen', $producto->imagen);
        $stmt->bindParam(':imagen_tipo', $producto->imagen_tipo);
        $stmt->bindParam(':imagen_tamanio', $producto->imagen_tamanio);
        
        $stmt->execute();
    }
    
    public static function actualizar($producto) {
        
        $con = Conexion::getConexion();
        
        $con->beginTransaction();   //Iniciar transaccion
        
        $query = "UPDATE productos SET categorias_id=:categorias_id, nombre=:nombre, descripcion=:descripcion, precio=:precio, stock=:stock "
                . "WHERE id=:id";
        
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':categorias_id', $producto->categorias_id);
        $stmt->bindParam(':nombre', $producto->nombre);
        $stmt->bindParam(':descripcion', $producto->descripcion);
        $stmt->bindParam(':precio', $producto->precio);
        $stmt->bindParam(':stock', $producto->stock);
        $stmt->bindParam(':id', $producto->id);
        
        $stmt->execute();
        
        
        if(isset($producto->imagen)){
            
            $query = "UPDATE productos SET imagen=:imagen, imagen_tipo=:imagen_tipo, imagen_tamanio=:imagen_tamanio) "
                    . "WHERE id=:id";
            
            $stmt = $con->prepare($query);
            
            $stmt->bindParam(':imagen', $producto->imagen);
            $stmt->bindParam(':imagen_tipo', $producto->imagen_tipo);
            $stmt->bindParam(':imagen_tamanio', $producto->imagen_tamanio);
            $stmt->bindParam(':id', $producto->id);

            $stmt->execute();
            
        }
        
        $con->commit(); //Consolidar transaccion
        
        // En Exception -> $con->rollback();
    }
    
    public static function eliminar($id) {
        
        $query = "DELETE FROM productos WHERE id=:id";
        
        $con = Conexion::getConexion();
        $stmt = $con->prepare($query);
        
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
    }
    
}
