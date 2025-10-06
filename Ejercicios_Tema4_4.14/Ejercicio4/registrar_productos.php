<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Insertar Productos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
  if (isset($_POST['numero'])) {
      $numero = (int)$_POST['numero'];
      if ($numero > 0) {
          echo '<form method="POST" action="guardar_productos.php">';
          for ($i = 1; $i <= $numero; $i++) {
              echo "<h3>Producto $i</h3>";
              echo '<label for="nombre">NOMBRE_ART:</label>';
              echo '<input type="text" name="nombre[]" required><br>';
              echo '<label for="precio">PRECIO:</label>';
              echo '<input type="number" step="0.01" name="precio[]" required><br>';
              echo '<label for="pais">PAIS:</label>';
              echo '<input type="text" name="pais[]" required><br>';
              echo '<hr>';
          }
          echo '<button type="submit">Guardar Productos</button>';
          echo '</form>';
      } else {
          echo "<p>El número de productos debe ser mayor que 0.</p>";
      }
  } else {
      echo "<p>No se recibió el número de productos. Regresa al formulario anterior.</p>";
  }
  ?>
</body>
</html>
