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
            <form method="post" action="index.php">
                Ingresa el producto:<br>
                <input type="text" name="nombre" size="50" required>
                <br>
                Ingresa el precio:<br>
                <input type="text" name="precio" size="50" required>
                <br>
                Ingresa la cantidad:<br>
                <input type="text" name="cantidad" size="50" required>
                <br>
                <input type="submit" value="Insertar">
            </form>
        </div>
    </body>
</html>