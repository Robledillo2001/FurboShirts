<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Número de Productos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST" action="registrar_productos.php">
    <label for="numero">Número de Artículos:</label>
    <input type="number" name="numero" id="numero" min="1" required><br>
    <button type="submit" name="archivar">Ir a insertar Productos</button>
  </form>
</body>
</html>
