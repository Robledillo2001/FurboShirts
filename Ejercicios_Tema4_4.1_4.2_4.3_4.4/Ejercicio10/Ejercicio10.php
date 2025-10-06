<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Usuarios Activos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<?php
    $user = "root";
    $contraseña = "";
    $host = "localhost";
    $bsd = "curso_php";
  
    // Conexión a la base de datos
    $conexion = mysqli_connect($host, $user, $contraseña, $bsd);

    if (!$conexion) {
      die("Conexión fallida: " . mysqli_connect_error());
    } else {
      echo "<h1>Conectado a la Base de Datos</h1><br>";
    }
  ?>

  <!-- Formulario HTML -->
  <form action="" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" ><br>
    <button type="submit">Enviar</button>
  </form>
  <?php
    if(isset($_POST['nombre'])){
      $nombre=mysqli_escape_string($conexion,$_POST['nombre']);

      $select="SELECT * FROM USUARIOS WHERE USUARIO='$nombre'";
      $consulta=mysqli_query($conexion,$select);

      if($consulta){
        echo "<h1>Usuario encontrado</h1>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Email</th></tr>";

        // Mostrar los registros obtenidos
        while ($datos = mysqli_fetch_assoc($consulta)) {
          echo "<tr>";
          echo "<td>" . $datos['ID'] . "</td>";
          echo "<td>" . $datos['USUARIO'] . "</td>";
          echo "<td>" . $datos['EMAIL'] . "</td>";
          echo "</tr>";
        }
      
      echo "</table>";
      } else{
        echo "Error en la consulta";
      }
    }
    
  ?>
</body>
</html>
