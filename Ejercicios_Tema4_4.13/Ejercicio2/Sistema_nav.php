<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>BUscars Productos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Insertar Producto</h1>

  <form action="" method="POST">
    <label for="codigo">Código del Producto:</label>
    <input type="text" id="codigo" name="codigo"><br><br>

    <input type="submit" name="buscarGeneral" value="Busqueda General">
    <input type="submit" name="buscarCodigo"value="BUscar por codigo">
  </form>

  <?php 
    if(isset($_POST['buscarGeneral'])){
      try{
        $conexion=new PDO("mysql:host=localhost;dbname=curso_php","root","");
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");
        echo"<h2>Conexion establecida</h2>";

        $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
  
        $sql="SELECT * FROM productos";
        $resultado=$conexion->prepare($sql);
  
        $resultado->execute();

        echo "<table border='1'>
            <th>Codigo_Art</th>
            <th>Nombre_Art</th>
            <th>Precio</th>
            <th>Pais</th>";
        while($fila=$resultado->fetch()){
          echo"<tr>
            <td>".$fila['CODIGO_ART']."</td>
            <td>".$fila['NOMBRE_ART']."</td>
            <td>".$fila['PRECIO']."</td>
            <td>".$fila['PAIS']."</td>
          </tr>";
        }
        echo"</table>";
      }catch(PDOException $e){
        die("ERROR: ".$e->getMessage());
      }
    }

    if(isset($_POST['buscarCodigo'],$_POST['codigo'])){
      try{
        $conexion=new PDO("mysql:host=localhost;dbname=curso_php","root","");
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");
        echo"<h2>Conexion establecida</h2>";

        $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
  
        $sql="SELECT * FROM productos WHERE CODIGO_ART=:codigo";
        $resultado=$conexion->prepare($sql);
  
        $resultado->execute([":codigo"=>$_POST['codigo']]);

        echo "<table border='1'>
            <th>Codigo_Art</th>
            <th>Nombre_Art</th>
            <th>Precio</th>
            <th>Pais</th>";
        while($fila=$resultado->fetch()){
          echo"<tr>
            <td>".$fila['CODIGO_ART']."</td>
            <td>".$fila['NOMBRE_ART']."</td>
            <td>".$fila['PRECIO']."</td>
            <td>".$fila['PAIS']."</td>
          </tr>";
        }
        echo"</table>";
      }catch(PDOException $e){
        die("ERROR: ".$e->getMessage());
      }
    }
  ?>
</body>
</html>
