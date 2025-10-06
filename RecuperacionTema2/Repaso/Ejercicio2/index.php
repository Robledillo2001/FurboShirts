<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descripción breve de tu página">
    <meta name="author" content="Tu Nombre">
    <meta name="keywords" content="HTML, plantilla, ejemplo">
    <title>Añadir Tarea</title>
</head>
<body>
    <form method="post" action="">
        <label for="producto">Producto:</label>
        <input type="text" name="producto" id="">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="">
        <input type="submit" value="Enviar Producto">
    </form>
    <?php
        $productos=[
            "Producto A" => 15, "Producto B" => 30, "Producto C" => 50
        ];
        if (isset($_POST['producto'])) {
            $productos[$_POST['producto']]=$_POST['precio'];
            echo "<ul>";
            foreach($productos as $producto=>$valor){
                echo"
                    <li>$producto:".$valor."</li>";
            }
            echo "</ul>";   
        }
    ?>
</body>
</html>
