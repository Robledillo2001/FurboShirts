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
    $user="root";
    $contraseña="";
    $host="localhost";
    $bsd="curso_php";
  
    $conexion=mysqli_connect($host,$user,$contraseña,$bsd);

    if(!$conexion){
      die("Conexion fallida: ".mysqli_connect_error());
    }else{
      echo "Conectado a la BSD";
    }

    $usuarios="CREATE TABLE IF NOT EXISTS USUARIOS(
          ID INT AUTO_INCREMENT PRIMARY KEY,
          USUARIO VARCHAR(50) NOT NULL,
          EMAIL VARCHAR(100) NOT NULL
    )";
    echo "<br>";
    if (mysqli_query($conexion, $usuarios)) {
      echo "Tabla 'USUARIOS' creada correctamente.";
    } else {
      echo "Error al crear la tabla 'USUARIOS': " . mysqli_error($conexion);
    }
  ?>
</body>
</html>
