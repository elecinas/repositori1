<?php
/**********DECLARACION DE VARIABLES***************/
$integer=1;
$double=1.1;
$string="La cadena";
$boolean=true;
$string2="La otra cadena";
/**********IMPRIMIMOS VALORES DE VARIABLES***************/
echo "El integer es igual a " .$integer. "<br>";
echo "El double es igual a " .$double. "<br>";
echo "El string 2 es igual a " .$string2. "<br>";
echo "El string es igual a " .$string. "<br>";
if (is_bool($boolean) === true) {
    echo 'Si, la variable $boolean es un booleano <br>';
}
/**********OPERACIONES CON LAS CADENAS***************/
$integer=strlen($string);
echo "<br>";
echo "La primera cadena tiene " . $integer . " caracteres.<br>";
$integer=strlen($string2);
echo "La segunda cadena tiene " . $integer . " caracteres.<br>";
echo "La primera cadena invertida es: " .strrev($string)."<br>";
echo "La segunda cadena invertida es: " .strrev($string2)."<br>";
echo "Los strings concatenados son: " .$string.$string2. "<br>";

/**********LA CONSTANTE CON MI NOMBRE***************/
define ("NOMBRE","esther");
echo "<br>";
echo "El valor de la constante NOMBRE es: " . NOMBRE . "<br>";

/**********LAS ARRAYS CON VALORES INTEGER***************/
$intarray1=[0,1,2,3,4];
echo "<br>";
print_r($intarray1);
$intarray2=[0,1,2];
echo "<br>";
print_r($intarray2);
echo "<br>";
array_push($intarray2,3);//insertamos un valor en el segundo array
print_r($intarray2);//comprovamos que funcione

echo "<br>";
$intarraysuma=array_merge($intarray1,$intarray2);//unimos las arrays
shuffle($intarraysuma);//mezclamos los valores
print_r($intarraysuma);//comprovamos que funcione
echo "<br>";
echo "El total del elementos dentro del array final es: ".count($intarraysuma)."<br>";

/**********ESCRIBIR LA ARRAY VALOR A VALOR***************/

foreach ($intarraysuma as $clave => $valor) {
    echo "clave: " . $clave . ", valor: " . $valor . ". <br>";
}
echo "<br>";

/**********VARIABLES x, y, n , m***************/

$x=7; //primera variable tipus int
$y=2; //segona variable tipus int
$operador=$x+$y;
echo "<br>";
echo "La variable x vale: ".$x.". Y la variable y vale: ".$y.".<br>";
echo "La suma de x mas y es: ".$operador."<br>";
$operador=$x-$y;
echo "La resta de x menos y es: ".$operador."<br>";
$operador=$x*$y;
echo "El producto de x por y es: ".$operador."<br>";
$operador=$x/$y;
echo "La division de x entre y es: ".$operador."<br>";
$operador=$x%$y;
echo "El modulo de x entre y es: ".$operador."<br>";
echo "<br>";

$n=1.1; //primera variable tipus double o float
$m=2.2; //segona variable tipus double o float

$operador=$n+$m;
echo "<br>";
echo "La variable n vale: ".$n.". Y la variable m vale: ".$m.".<br>";
echo "La suma de n mas m es: ".$operador."<br>";
$operador=$n-$m;
echo "La resta de n menos m es: ".$operador."<br>";
$operador=$n*$m;
echo "El producto de n por m es: ".$operador."<br>";
$operador=$n/$m;
echo "La division de n entre m es: ".$operador."<br>";
$operador=$n%$m;
echo "El modulo de n entre m es: ".$operador."<br>";
echo "<br>";
$operador=2*$x;
echo "El doble de todas las variables es: <br>";
echo "2x=".$operador."<br>";
$operador=2*$y;
echo "2y=".$operador."<br>";
$operador=2*$n;
echo "2n=".$operador."<br>";
$operador=2*$m;
echo "2m=".$operador."<br>";
echo "<br>";
$operador= $x+$y+$n+$m;//suma de todas las variables
echo "La suma de x+y+n+m es: ".$operador."<br>";
$operador= $x*$y*$n*$m;//producto de todas las variables
echo "El producto de x*y*n*m es: ".$operador."<br>";

echo "<br>";

?>
