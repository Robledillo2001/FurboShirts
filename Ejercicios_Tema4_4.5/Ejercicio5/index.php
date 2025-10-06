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
    require_once("funciones.php");

    if($conexion){
     if($consulta){
      echo"<table border='1'>";
      echo "<tr>";
      echo "<th>ID</th>";
      echo "<th>Nombre</th>";
      echo "<th>Correo</th>";
      echo "</tr>";
      foreach($consulta as $clave){
        echo"<tr>";
        echo"<td>".$clave['ID']."</td>";
        echo"<td>".$clave['USUARIO']."</td>";
        echo"<td>".$clave['EMAIL']."</td>";
        echo"</tr>";
      }
     }else{
        error_log("Error en la consulta SQL: " . mysqli_error($conexion));
        die("<p>Error al ejecutar la consulta: " . mysqli_error($conexion) . "</p>");
     }
  }else{
      // Registrar el error
      error_log("Error de conexión: " . mysqli_connect_error());

      // Detener ejecución con mensaje del error técnico
      die("<p>Error de conexión: " . mysqli_connect_error() . "</p>");
  }
  ?>
</body>
</html>
