<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"></meta>
        <title>PIZZERÍA SELENITA</title>
        <link rel="stylesheet" href="css/estilos.css">
        <script src="js/main.js"></script>
    </head>
    <body>

        <?php
        /*         * *************NIVEL 1: EJERCICIO 1: FUNCION resta()****** */

        function resta($n1, $n2) {
            $resultat = $n1 - $n2;
            return $resultat;
        }

        $num = resta(4, 2);
        echo $num;
        echo "<br>";

        /*         * *************NIVEL 1: EJERCICIOS 2 y 3: FUNCION espar()****** */

        function espar($victimilla) {
            $rest = $victimilla % 2;
            if ($rest == 0) {
                return true;
            } else {
                return false;
            }
        }

        $bool = espar($num);//cogemos el número resultado dela resta del ejercicio anterior
        if ($bool) {
            echo "Numero par";
        } else {
            echo "Numero impar";
        }

        echo "<br>";
        echo "<br>";

        /****NIVEL 1: EJERCICIO 4: cuenta hasta 10***/

        for ($x = 1; $x <= 10; $x++) {
            echo $x . " ";
        }
        echo "<br>";
        echo "<br>";

        /*************NIVEL 2: EJERCICIO 1 cuenta10 de 2 en 2***********/

        function cuentatrampa() {
            for ($x = 2; $x <= 10; $x += 2) {
                echo $x . " ";
            }
        }

        cuentatrampa();
        echo "<br>";
        echo "<br>";


        /*         * *NIVEL 2: EJERCICIOS 2 Y 3 cuenta hasta $x de 2 en 2*** */

        function cuentatrampa2($valor) {
            if (!is_numeric($valor)) {//comprueba que el parámetro recibido sea numérico
                $valor = 10;
            }
            for ($x = 0; $x <= $valor; $x += 2) {
                echo $x . " ";
            }
        }

        cuentatrampa2("20"); //aunque es una cadena se envía y funciona
        echo "<br>";
        echo "<br>";

        /*         * *NIVEL 3: EJERCICIO 1 anys_olimpics()* */

        echo "<b>Anys olímpics: </b><br>";
        for ($x = 1960; $x <= 2016; $x += 4) {
            echo $x . " - ";
        }
        echo "<br>";
        echo "<br>";

        /*         * ***NIVEL 3: EJERCICIO 2 La tienda***** */

        $chicles = 1; //valen 0.50
        $chocolates = 2; //valen 1
        $caramelos = 1; //valen 1.50

        function calculachuches($chic, $choc, $car) {
            $total = $chic * 0.5 + $choc + $car * 1.5;
            echo "Has cogido " . $chic . " chicles, " . $choc . " chocolates y " . $car . " caramelos. <br> En total, todo suma " . $total . " euros.";
        }

        calculachuches($chicles, $chocolates, $caramelos);
        echo "<br>";
        echo "<br>";

        //*******NIVEL 3: EJERCICIO 3 criba de Erastótenes*******//

        $rango = 64;
        for ($i = 2; $i < $rango; $i++) {
            $numeros[$i] = true;
        }

        $numeros[2] = true;//marcamos el primer primo como tal

        for ($n = 2; $n < $rango; $n++) {
            if ($numeros[$n]) {
                for ($i = $n * $n; $i < $rango; $i += $n) {
                    $numeros[$i] = false;//se marcan los que no son primos
                }
            }
        }
        echo "<b>Los números primos son:</b><br>";
        for ($n = 2; $n < $rango; $n++) {
            if ($numeros[$n]) {
                echo $n . " ";//escribimos los que no estan marcados
            }
        }
        ?>
    </body>
</html>