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
      echo "Conexion completada";
    }else if($conexion_error){
      echo "Error en la conexion: ".$conexion->_error;
    }
  ?>
</body>
</html>
