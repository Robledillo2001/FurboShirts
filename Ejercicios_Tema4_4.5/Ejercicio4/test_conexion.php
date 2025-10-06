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
      $select="SELECT * FROM usuarios";
      $consulta=mysqli_query($conexion,$select);
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
        die("Consulta fallida fallida ".mysqli_error($conexion));
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
