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
    $errores="error.log";
    try{
      $conexion=new PDO("mysql:host=localhost;dbname=curso_php","root","4");
      $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      echo"<h2>Conexion establecida</h2>";
    }catch(PDOException $e){
      $error="ERROR: ".$e->getMessage();
      file_put_contents("error.log", date('Y-m-d H:i:s') . " - " . $error . PHP_EOL, FILE_APPEND);
    }
    
  ?>
</body>
</html>
