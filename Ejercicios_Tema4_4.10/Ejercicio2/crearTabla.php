<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Buscar por nombre</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php 
    $conexion=new mysqli("localhost","root","","curso_php");

    if($conexion){
      echo "Conexion completada<br>";
    }else if($conexion_error){
      echo "Error en la conexion: ".$conexion->error."<br>";
    }

    $tabla="CREATE TABLE IF NOT EXISTS productos_1(
      ID INT AUTO_INCREMENT PRIMARY KEY,
      NOMBRE VARCHAR(50) NOT NULL,
      PRECIO DECIMAL(10,2) NOT NULL,
      STOCK INT NOT NULL
    )";
    $resultado=$conexion->query($tabla);

    if($resultado){
      echo "Tabla creada<br>";
    }else{
      echo "Error en crear tabla: ".$conexion->error."<br>";
    }
  ?>
</body>
</html>
