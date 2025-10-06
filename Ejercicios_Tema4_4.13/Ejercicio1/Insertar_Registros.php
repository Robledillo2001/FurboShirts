<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Insertar Productos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Insertar Producto</h1>

  <form action="" method="POST">
    <label for="codigo">Código del Producto:</label>
    <input type="text" id="codigo" name="codigo" required><br><br>

    <label for="nombre">Nombre del Producto:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" step="0.01" required><br><br>

    <label for="pais">País de Origen:</label>
    <input type="text" id="pais" name="pais" required><br><br>

    <input type="submit" value="Insertar Producto">
  </form>

  <?php 
    if(isset($_POST['codigo'],$_POST['nombre'],$_POST['precio'],$_POST['pais'])){

      try{
        $conexion=new PDO("mysql:host=localhost;dbname=curso_php","root","");
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");
        echo"<h2>Conexion establecida</h2>";
  
        $sql="INSERT INTO productos(CODIGO_ART,NOMBRE_ART,PRECIO,PAIS)VALUES(:codigo, :nombre, :precio, :pais)";
        $resultado=$conexion->prepare($sql);
  
        $resultado->execute(array(
          ":codigo"=>$_POST['codigo'],
          ":nombre"=>$_POST['nombre'],
          ":precio"=>$_POST['precio'],
          ":pais"=>$_POST['pais']
        ));
        echo"Registro Insertado";
      }catch(PDOException $e){
        die("ERROR: ".$e->getMessage());
      }
    }
  ?>
</body>
</html>
