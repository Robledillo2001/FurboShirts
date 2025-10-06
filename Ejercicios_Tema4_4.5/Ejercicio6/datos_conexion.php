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
    $pass="2";
    $red="localhost";
    $BaseDatos="curso_php";

    // Habilitar el registro de errores
    ini_set("log_errors", 1);
    ini_set("error_log", "error.log");

    $conexion= @mysqli_connect($red,$user,$pass,$BaseDatos);

    if (!$conexion) {
      error_log("Error de conexión: " . mysqli_connect_error());
      die("Error al conectar a la base de datos. Consulta el archivo error.log para más detalles.");
    }
  ?>
</body>
</html>
