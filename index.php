<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lista de la compra</title>
		<link rel="stylesheet" href="css/estilos.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet"> 
	</head>
	<body>
		<?php /*include 'conexionbd.php';*/
                include 'dibujatabla.php';
                    

                $mysql = new mysqli("localhost", "root", "", "sprint_8_compra");
                if($mysql->connect_error)
                    die('Problemas de conexión con la base de datos');
                
                $registros = $mysql->query("SELECT Nombre, Precio, Cantidad FROM compra")
                        or die($mysql->error);
                
                /*TABLA*/
               echo '<table class="tabla_compra">';
                echo '<tr><th>nombre</th><th>precio</th><th>cantidad</th></tr>';
                while ($reg=$registros->fetch_array())
                {
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
                
                /*CLASS TABLA*/
                $tabla_clase = new Tabla($registros);
                $tabla_clase->graficar();
                
                
                
                
                $mysql->close();
                
                ?>

	</body>
</html>