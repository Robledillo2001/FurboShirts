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
    mysqli_report(MYSQLI_REPORT_OFF);

    $user="root";
    $pass="";
    $red="localhost";
    $BaseDatos="curso_php";

    $conexion = @mysqli_connect($red, $user, $pass, $BaseDatos);
  ?>
</body>
</html>
