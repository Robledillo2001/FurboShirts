<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Insertar Pedidos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST">
    <label for="codigo">CODIGO:</label>
    <input type="text" name="codigo" required><br>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>
    <button type="submit" name="archivar">Encargar Pedido</button>
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      echo "<h2>Conexión establecida</h2>";

      if (isset($_POST['nombre'], $_POST['codigo'])) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];

        // Verificar si el producto existe
        $sqlProductos = "SELECT * FROM productos_1 WHERE ID=?";
        $stmt = $conexion->prepare($sqlProductos);
        $stmt->execute([$codigo]);
        $fila = $stmt->fetch();

        // Verificar si hay stock
        if ($fila['STOCK'] <= 0) {
          echo "<p style='color: red;'>No quedan productos en stock.</p>";
          exit;
        }

        $precio = $fila['PRECIO'];

        // Insertar pedido sin especificar el ID
        $sqlPedidos = "INSERT INTO pedidos (ID_ART,NOMBRE,PRECIO) VALUES (?,?, ?)";
        $stmt = $conexion->prepare($sqlPedidos);
        $stmt->execute([$codigo, $nombre, $precio]);

        // Actualizar el stock
        $sqlStock = "UPDATE productos_1 SET STOCK = STOCK - 1 WHERE ID=?";
        $stmt = $conexion->prepare($sqlStock);
        $stmt->execute([$codigo]);

        echo "<p style='color: green;'>Pedido realizado con éxito.</p>";
      }
    } catch (PDOException $e) {
      // Manejo de errores
      die($e->getMessage());
    } finally {
      // Cerrar conexión
      $conexion = null;
    }
    ?>
  </form>
</body>
</html>
