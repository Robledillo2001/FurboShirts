<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo BSD POO statement</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="POST">
        <label for="id">ID: </label>
        <input type="text" name="id"><br>
        <button type="submit">Eliminar</button>
    </form>
    <?php
        if (isset($_POST['id'])) {
            $conexion = new mysqli("localhost", "root", "", "curso_php");
            if ($conexion->connect_error) {
                die("Fallo en la conexión: " . $conexion->connect_error);
            }
        
            $conexion->set_charset("utf8");
        
            // Paso 1: Eliminar filas dependientes en la tabla `pedidos`
            $sql = "DELETE FROM pedidos WHERE ID_ART = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $_POST['id']);
            if (!$stmt->execute()) {
                die("Error al eliminar de la tabla pedidos: " . $stmt->error);
            }
        
            // Paso 2: Eliminar de la tabla `productos_1`
            $sql = "DELETE FROM productos_1 WHERE ID = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $_POST['id']);
            if ($stmt->execute()) {
                echo "Producto eliminado correctamente.";
            } else {
                die("Error al eliminar de la tabla productos_1: " . $stmt->error);
            }
        
            $stmt->close();
            $conexion->close();
        }
    ?>
</body>
</html>
