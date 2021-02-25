<?php

class Tabla {

    //Atributos
    private $contenido_tabla = array();

    //Constructor
    public function __construct($cont_tab) {
        $this->contenido_tabla = $cont_tab;
    }

    public function graficar() {
        print_r($this->contenido_tabla->fetch_array());
        if(!empty($this->contenido_tabla)){echo 'La variable contiene la tabla';};
        echo '<table class="tabla_compra">';
        echo '<tr><th>nombre</th><th>precio</th><th>cantidad</th></tr>';
        
        while ($reg = $this->contenido_tabla->fetch_array()) {
            var_dump($reg);
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
            echo '</tr>';
        }
        echo '</table>';
    }

}
