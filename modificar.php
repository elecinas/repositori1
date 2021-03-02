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
            $id_producto = $_POST['id_producto'];
            $nombre_producto = $_POST['nombre'];
            echo '<h1>' . $nombre_producto . '</h1><br>';
            ?>
            <form method="post" action="aceptar.php">
                <?php
                echo '<input type="hidden" name="id_producto" value="' . $id_producto . '">';
                echo '<input type="hidden" name="nombre" value="' . $nombre_producto . '">';
                echo 'Ingresa el nuevo precio:<br>';
                echo '<input type="text" name="precio" size="50" required>';
                echo '<br>';
                echo 'Ingresa la nueva cantidad:<br>';
                echo '<input type="text" name="cantidad" size="50" required>';
                echo '<br>';
                echo '<br>';
                echo '<input type="submit" value="Modificar">';
                ?>
            </form>
        </div>
    </body>
</html>