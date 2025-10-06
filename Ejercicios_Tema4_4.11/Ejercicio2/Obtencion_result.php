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
    try{
      $conexion=new PDO("mysql:host=localhost;dbname=curso_php","root","");
      $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      echo"<h2>Conexion establecida</h2>";

      $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
      $select="SELECT * FROM productos_1";
      $stmt=$conexion->query($select);

      if($stmt){
        $stmt->execute();
        foreach($stmt as $fila){
          echo"<H1>".$fila['NOMBRE']."</H1>";
          echo"<ul>
              <li>ID: ".$fila['ID']."</li>
              <li>PRECIO: ".$fila['PRECIO']."</li>
              <li>STOCK: ".$fila['STOCK']."</li>
          </ul>";
        }
      }

    }catch(PDOException $e){
      die("ERROR: ".$e->getMessage());
    }
    
  ?>
</body>
</html>
