<?php
//namespace Espacio\De\Nombres;

class Constante {
    
    const DB_HOST = 'localhost';
    
    const DB_USER = 'root';
    
    const DB_PASS = 'orlando';
    
    const DB_SCHEMA = 'eventos';
    
}
class Conexion {
   
    static private $instance;
    
    /**
    * @return PDO Return a PDO instance representing a connection to a database
    */
    public static function getConexion() {
        
        if(self::$instance == NULL){
            $host = Constante::DB_HOST;
            $schema = Constante::DB_SCHEMA;
            $PDOinstance = new PDO("mysql:host=$host;dbname=$schema", Constante::DB_USER, Constante::DB_PASS);
            $PDOinstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance = $PDOinstance;
        }
        return self::$instance;
        
    }
    
}
