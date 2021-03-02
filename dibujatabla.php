<?php

include("conexionbd.php");

class Tabla {

    //variables
    private $instanciaBD;

    //constructor
    public function __construct() {
        $this->instanciaBD = new MySQL();
        $this->instanciaBD->conectar();
    }

    //funciones
    public function consultaBD($cons) {
        $consultaselect = $this->instanciaBD->consultar($cons);
        if ($consultaselect == true) {
            echo '<table class="tabla_compra">';
            echo '<tr><th>nombre</th><th>precio</th><th>cantidad</th><th>modificar</th><th>eliminar</th></tr>';
            while ($reg = $this->instanciaBD->obtenerconsulta()) {
                echo '<tr>';
                echo '<td>';
                echo $reg['Nombre'];
                echo '</td>';
                echo '<td>';
                echo $reg['Precio'];
                echo '</td>';
                echo '<td>';
                echo $reg['Cantidad'];
                echo '</td>';
                echo '<td>';
                echo '<form method="post" action="modificar.php">';
                echo '<input type="hidden" name="id_producto" value="'.$reg['id_compra'].'">';
                echo '<input type="hidden" name="nombre" value="'.$reg['Nombre'].'">';
                echo '<input type="submit" value="modificar">';
                echo '</form>';
                echo '</td>';
                echo '<td>';
                echo '<form method="post" action="index.php">';
                echo '<input type="hidden" name="id_producto" value="'.$reg['id_compra'].'">';
                echo '<input type="submit" value="eliminar">';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        $this->instanciaBD->desconectar();
    }
    
    public function insercionBD($cons) {
        $consultaselect = $this->instanciaBD->consultar($cons);
        /*if ($consultaselect == true) {
            echo 'se ha hecho el ingreso';
        }*/
        $this->instanciaBD->desconectar();
    }

}