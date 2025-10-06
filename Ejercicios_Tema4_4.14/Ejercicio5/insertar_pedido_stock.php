<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ingresar Pedidos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST">
    <label for="nombre">Nombre Producto</label>
    <input type="text" name="nombre" required><br>
    <label for="cantidad">Cantidad:</label>
    <input type="text" name="cantidad" required><br>
    <button type="submit">Añadir Pedido</button>
    <?php
      try {
          // Conexión a la base de datos
          $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
          echo "<h2>Conexión establecida</h2>";
      
          if (isset($_POST['nombre'], $_POST['cantidad'])) {
              $conexion->beginTransaction();
      
              $nombre = $_POST['nombre'];
              $cantidad = (int)$_POST['cantidad'];
      
              // Verificar existencia del producto
              $stmt = $conexion->prepare("SELECT STOCK, ID, PRECIO FROM productos_1 WHERE NOMBRE = ?");
              $stmt->execute([$nombre]);
      
              $fila = $stmt->fetch(PDO::FETCH_ASSOC);
      
              if ($fila) {
                  $id_art = $fila['ID'];
                  $stock = $fila['STOCK'];
                  $precio = $fila['PRECIO'];
      
                  if ($stock > 0 && $cantidad <= $stock) {
                      // Insertar pedido
                      $stmt_insert = $conexion->prepare("INSERT INTO pedidos (ID_ART, NOMBRE, PRECIO, CANTIDAD) VALUES (?, ?, ?, ?)");
                      $stmt_insert->execute([$id_art, $nombre, $precio, $cantidad]);
      
                      // Actualizar stock
                      $stmt_update = $conexion->prepare("UPDATE productos_1 SET STOCK = STOCK - ? WHERE NOMBRE = ?");
                      $stmt_update->execute([$cantidad, $nombre]);
      
                      $conexion->commit();
      
                      echo "Pedido ingresado correctamente.";
                  } else {
                      echo "Cantidad solicitada no disponible en stock.";
                      $conexion->rollBack();
                  }
              } else {
                  echo "No existe el producto.";
                  $conexion->rollBack();
              }
          }
      } catch (PDOException $e) {
          if ($conexion->inTransaction()) {
              $conexion->rollBack();
          }
          die("Error en el pedido: " . $e->getMessage());
      } finally {
          // Cerrar conexión
          $conexion = null;
      }
    ?>
  </form>
</body>
</html>
