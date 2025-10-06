<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>comentarios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
    require_once("datos_conexion.php");
    $select="SELECT * FROM usuarioss";
    $consulta = @mysqli_query($conexion, $select);
  ?>
</body>
</html>
