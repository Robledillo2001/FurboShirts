<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Confirmar Actualización</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <?php
      mysqli_report(MYSQLI_REPORT_OFF);
      $conexion = @mysqli_connect('localhost', 'root', '', 'curso_php');

      if (!$conexion) {
          die("Error de conexión: " . mysqli_connect_error());
      }

      if (isset($_POST['codigo'])) {
          $codigo = mysqli_escape_string($conexion, $_POST['codigo']);

          if (empty($codigo) || !is_numeric($codigo)) {
              die("Por favor, ingrese un código válido.");
          }

          // Consulta para buscar el producto por código
          $query = "SELECT * FROM productos WHERE CODIGO_ART = $codigo";
          $resultado = @mysqli_query($conexion, $query);

          if (mysqli_num_rows($resultado) > 0) {
              $producto = mysqli_fetch_assoc($resultado);
          } else {
              die("No se encontró el producto con código $codigo.");
          }
      } else {
          die("No se recibió ningún código.");
      }
  ?>

  <!-- Formulario de actualización con datos recuperados -->
  <form method="post" action="actualizar_producto.php">
      <input type="hidden" name="codigo" value="<?php echo $producto['CODIGO_ART']; ?>">
      <label for="nombre">Nombre Artículo:</label>
      <input type="text" name="nombre" value="<?php echo $producto['NOMBRE_ART']; ?>" required><br>
      <label for="precio">Precio:</label>
      <input type="text" name="precio" value="<?php echo $producto['PRECIO']; ?>" required><br>
      <label for="pais">País:</label>
      <input type="text" name="pais" value="<?php echo $producto['PAIS']; ?>" required><br>
      <button type="submit">Actualizar Producto</button>
  </form>
  <a href="buscar_producto.php"><button>Volver a Buscar Producto</button></a>
</body>
</html>
