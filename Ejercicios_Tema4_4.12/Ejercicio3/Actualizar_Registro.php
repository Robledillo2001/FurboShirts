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
      $conexion=new PDO("mysql:host=localhost;dbname=curso_php","root","");
      $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      echo"<h2>Conexion establecida</h2>";

      $conexion->exec("SET CHARACTER SET utf8");

      $sql="UPDATE productos_1 SET PRECIO=? WHERE ID=?";
      $stmt=$conexion->prepare($sql);

      $precio=120.45;
      $id=3;

      $stmt->bindParam(1,$precio,PDO::PARAM_STR);
      $stmt->bindParam(2,$id,PDO::PARAM_INT);

      $stmt->execute();

      echo"Actualizacion completada<br>";
    }catch(PDOException $e){
      $error="ERROR: ".$e->getMessage();
      file_put_contents("error.log", date('Y-m-d H:i:s') . " - " . $error . PHP_EOL, FILE_APPEND);
    }
    
  ?>
</body>
</html>
