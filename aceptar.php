<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de la compra</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <div class="content">
            <?php
            include 'dibujatabla.php';
            $id_producto = $_POST['id_producto'];
            $nombre_producto = $_POST['nombre'];
            $precio_producto = $_POST['precio'];
            $cantidad_producto = $_POST['cantidad'];

            $tabla_insert = new Tabla();
            $tabla_insert->insercionBD(
                    "UPDATE compra SET Precio = " . $precio_producto . ", Cantidad = " . $cantidad_producto . " WHERE id_compra = " . $id_producto . ";"
            );

            echo '<h1>' . $nombre_producto . '</h1><br>';
            echo 'Nuevo precio: ' . $precio_producto . ' euros.';
            echo '<br>';
            echo 'Nueva cantidad: ' . $cantidad_producto . ' unidades.';
            echo '<br>';
            echo '<br>';
            ?>
            <p><a href="index.php">Volver</a></p>
        </div>
    </body>
</html>