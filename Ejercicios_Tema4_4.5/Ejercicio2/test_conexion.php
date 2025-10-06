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
    require("datos_conexion.php");

    if (!$conexion) {
      // Formatear el mensaje de error
      $mensajeError = "Error de conexión: " . mysqli_connect_error() . " (" . date("Y-m-d H:i:s") . ")\n";
      
      // Registrar el error en el archivo de log
      error_log($mensajeError, 3, "error.log");
    } else {
        echo "Conexión exitosa";
    }
  ?>
</body>
</html>
