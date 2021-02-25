<?php
class Conexion {
    /*DECLARACION DE VARIABLES*/
    private $conexion;
    private static $_instancia;
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'sprint_8_compra';
    
    /*CONSTRUCTOR*/
    private function __construct()
    {
        $this->conexion = new mysqli($this->host, $this->user, $this->password, $this->database);
        if(mysqli_connect_error())
        {
            trigger_error("No se pudo conectar a la base de datos: " . mysql_connect_error(),E_USER_ERROR);
        }
    }
}

