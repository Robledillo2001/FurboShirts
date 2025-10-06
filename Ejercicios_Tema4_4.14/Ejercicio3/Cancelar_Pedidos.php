<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Cancelar Pedidos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST">
    <label for="id">ID ART:</label>
    <input type="text" name="id" required><br>
    <button type="submit" name="archivar">BORRAR Pedidos</button>
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones

      if (isset($_POST['id'])) { // Solo necesitas 'id' para borrar pedidos
        $id = $_POST['id'];

        $conexion->beginTransaction(); // Iniciamos la transacción

        // Obtener el número de pedidos con el ID_ART (esto es el stock que vamos a devolver)
        $stmt = $conexion->prepare("SELECT sum(CANTIDAD) FROM pedidos WHERE ID_ART = ?");
        $stmt->execute([$id]);
        $stock = $stmt->fetchColumn(); // Devuelve el número de registros que coinciden

        if ($stock > 0) {
          // Eliminar los pedidos relacionados con el ID_ART
          $stmt = $conexion->prepare("DELETE FROM pedidos WHERE ID_ART = ?");
          $stmt->execute([$id]);

          // Actualizar el stock del producto en la tabla productos_1
          $stmt = $conexion->prepare("UPDATE productos_1 SET STOCK = STOCK + ? WHERE ID = ?");
          $stmt->execute([$stock, $id]);

          // Confirmar los cambios realizados
          $conexion->commit();
          echo "Pedido eliminado con éxito y stock actualizado.";
        } else {
          echo "No existen pedidos para el ID_ART proporcionado.";
        }
      }
    } catch (PDOException $e) {
      // Si ocurre un error, revertimos los cambios realizados
      $conexion->rollBack();
      die("Fallo en la transacción: " . $e->getMessage());
    } finally {
      // Cerrar la conexión
      $conexion = null;
    }
    ?>
  </form>
</body>
</html>
