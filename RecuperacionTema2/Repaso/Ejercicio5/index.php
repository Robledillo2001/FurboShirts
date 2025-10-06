<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descripción breve de tu página">
    <meta name="author" content="Tu Nombre">
    <meta name="keywords" content="HTML, plantilla, ejemplo">
    <title>Lista Compra</title>
</head>
<body>
    <form method="post" action="">
        <label for="nombre">Nombre Producto</label>
        <input type="text" name="nombre"><br>
        <label for="precio">Precio</label>
        <input type="number" name="precio"><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        session_start();
        if(!isset($_SESSION['productos'])){
            $_SESSION['productos']=[];
        }

        if (isset($_POST['nombre'], $_POST['precio'])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];

            $_SESSION['productos'][]=[
                "nombre"=>$nombre,
                "precio"=>$precio
            ];

            echo"<table border=1>
                    <tr>
                        <th colspan='2'>Productos de la Tienda</th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>";

            foreach($_SESSION['productos'] as $producto){
                echo "<tr>
                        <td>".$producto['nombre']."</td>
                        <td>".$producto['precio']."€</td>
                    </tr>";
            }
            echo"</table>";
        }
        /*session_unset();
        session_destroy();
        echo "Sesion Finalizada";*/
    ?>
</body>
</html>
