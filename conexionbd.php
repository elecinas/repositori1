<?php

class MySQL {

    private $conexion;
    private $consulta;
    private $resultado;

    public function conectar() {
        $this->conexion = new mysqli("localhost", "root", "", "sprint_8_compra");
        if ($this->conexion->connect_error)
            die('Problemas de conexión con la base de datos');
    }

    public function consultar($cons) {
        $this->consulta = $this->conexion->query($cons)
                or die($this->consulta->error);
        return $this->consulta;
    }

    public function obtenerconsulta() {
        $this->resultado = $this->consulta->fetch_array();
        return $this->resultado;
    }
    
    public function desconectar(){
        $this->conexion->close();
    }

}
