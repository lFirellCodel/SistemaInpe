<?php
//namespace Espacio\De\Nombres;
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
    function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
    }

}
