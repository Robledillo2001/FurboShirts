<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Actualizar Precios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST">
    <label for="Precio">Nuevo Precio para los Productos Seleccionados:</label>
    <input type="text" name="Precio" required><br>
    
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      echo "<h2>Conexión establecida</h2>";

      // Consultar productos existentes
      $sql = "SELECT * FROM productos";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();

      // Mostrar productos en una tabla con checkboxes
      echo "<table border='1'>
              <tr>
                <th>Seleccionar</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>País</th>
              </tr>";
      
      while ($fila = $resultado->fetch()) {
        echo "<tr>
                <td><input type='checkbox' name='productos[]' value='" . htmlspecialchars($fila['CODIGO_ART']) . "'></td>
                <td>" . htmlspecialchars($fila['CODIGO_ART']) . "</td>
                <td>" . htmlspecialchars($fila['NOMBRE_ART']) . "</td>
                <td>" . htmlspecialchars($fila['PRECIO']) . "</td>
                <td>" . htmlspecialchars($fila['PAIS']) . "</td>
              </tr>";
      }
      echo "</table>";

      // Procesar actualización de precios para productos seleccionados
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['productos'], $_POST['Precio'])) {
        $productos = $_POST['productos'];
        $nuevoPrecio = $_POST['Precio'];

        // Validar que el precio sea numérico
        if (!is_numeric($nuevoPrecio)) {
          echo "<p style='color: red;'>El precio debe ser un valor numérico.</p>";
          exit;
        }

        // Crear una consulta SQL con marcadores de posición
        $placeholders = implode(',', array_fill(0, count($productos), '?'));
        $sql = "UPDATE productos SET PRECIO = ? WHERE CODIGO_ART IN ($placeholders)";
        $stmt = $conexion->prepare($sql);

        // Preparar el array de parámetros
        $params = array_merge([$nuevoPrecio], $productos);

        // Ejecutar la consulta con los valores seleccionados
        $stmt->execute($params);

        echo "<p style='color: green;'>Precio actualizado correctamente para los productos seleccionados.</p>";

        // Redirigir para evitar reenvío del formulario
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
      }
    } catch (PDOException $e) {
      // Manejo de errores
      $error = "ERROR: " . $e->getMessage();
      file_put_contents("error.log", date('Y-m-d H:i:s') . " - " . $error . PHP_EOL, FILE_APPEND);
      echo "<h2>Error al conectar. Revisa el archivo de log.</h2>";
    } finally {
      // Cerrar conexión
      $conexion = null;
    }
    ?>
    <button type="submit">Actualizar Precio</button>
  </form>
</body>
</html>
