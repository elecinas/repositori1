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
            //comprobamos el contenido de POST para hacer la insercion de un posible producto nuevo
            if (!empty($_POST['nombre']) && !empty($_POST['precio']) && !empty($_POST['cantidad'])) {
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $cantidad = $_POST['cantidad'];
                $tabla_insert = new Tabla();
                $tabla_insert->insercionBD(
                        "INSERT INTO compra (Nombre, Precio, Cantidad) VALUES ('" . $nombre . "', '" . $precio . "', '" . $cantidad . "');"
                );
                unset($_POST['nombre']); //Vaciamos las variables
                unset($_POST['precio']);
                unset($_POST['cantidad']);
            }

            //lo mismo pero para eliminar un producto
            if (!empty($_POST['id_producto'])) {
                $id = $_POST['id_producto'];
                $tabla_delete = new Tabla();
                $tabla_delete->insercionBD("DELETE FROM compra WHERE id_compra = " . $id . ";");
            }

            //comprobamos el contenido de POST para la eliminación de algún producto
            $tabla_clase = new Tabla();
            $tabla_clase->consultaBD("SELECT Nombre, Precio, Cantidad, id_compra FROM compra");
            ?>
            <br>
            <form action="insereix.php">
                <input type="submit" value="Nou producte">
            </form>
        </div>
    </body>
</html>