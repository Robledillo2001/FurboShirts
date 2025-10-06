<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo PDO con Consultas Preparadas</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="POST">
        <label for="precio">Precio: </label>
        <input type="number" name="precio" step="0.01" required><br>
        <button type="submit">BUSCAR</button>
    </form>

    <?php
        try {
            // Establecer conexión con PDO
            $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");

            // Validar si el formulario ha sido enviado
            if (isset($_POST['precio']) && is_numeric($_POST['precio'])) {
                $precio = (float)$_POST['precio']; // Convertir el valor a float

                // Consulta SQL con parámetro
                $sql = "SELECT * FROM productos_1 WHERE PRECIO > ?";
                $stmt = $conexion->prepare($sql);

                // Vincular el parámetro
                $stmt->bindParam(1, $precio, PDO::PARAM_STR);

                // Ejecutar la consulta
                $stmt->execute();

                // Verificar si hay resultados
                if ($stmt->rowCount() > 0) {
                    // Mostrar resultados
                    echo "<h1>PRECIOS MAYOR A $precio €</h1>";
                    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<ul>
                                <li>ID: " . $fila['ID'] . "</li>
                                <li>Nombre: " . $fila['NOMBRE'] . "</li>
                                <li>Precio: " . $fila['PRECIO'] . "</li>
                                <li>Stock: " . $fila['STOCK'] . "</li>
                              </ul>";
                    }
                } else {
                    echo "<p>No se encontraron productos con un precio mayor a " . $precio . ".</p>";
                }
            } else {
                echo "<p>Por favor, ingrese un precio válido.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Error en la conexión o consulta: " . $e->getMessage() . "</p>";
        }
    ?>
</body>
</html>
