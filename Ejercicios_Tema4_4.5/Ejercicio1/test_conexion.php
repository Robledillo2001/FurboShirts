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

    if($conexion){
      echo "Conexion correcta";
    }else{
      // Registrar el error
      error_log("Error de conexión: " . mysqli_connect_error());

      // Detener ejecución con mensaje del error técnico
      die("<p>Error de conexión: " . mysqli_connect_error() . "</p>");
    }
  ?>
</body>
</html>
