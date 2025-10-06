<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Insertar Pedidos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST">
    <label for="id">ID ART:</label>
    <input type="text" name="id" required><br>
    <label for="nombre">NOMBRE ART:</label>
    <input type="text" name="nombre" required><br>
    <label for="precio">PRECIO ART:</label>
    <input type="text" name="precio" required><br>
    <label for="cantidad">Cantidad Produducto:</label>
    <input type="text" name="cantidad" required><br>
    <button type="submit" name="archivar">Encargar Pedido</button>
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      echo "<h2>Conexión establecida</h2>";
      
      if(isset($_POST['id'],$_POST['cantidad'],$_POST['precio'],$_POST['nombre'])){//Sacar datos de la tabla de productos
        $id=$_POST['id'];
        $cantidad=$_POST['cantidad'];
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];

        $conexion->beginTransaction();//Comenzamos transaccion

        $conexion->exec("INSERT INTO pedidos(ID_ART,NOMBRE,PRECIO,CANTIDAD)VALUES($id,'$nombre',$precio,$cantidad)");//Insertamos pedidos 
        $conexion->exec("UPDATE productos_1 SET STOCK=STOCK-$cantidad WHERE ID=$id");//Restamos la cantidad total del producto

        $conexion->commit();//Guardamos lo cambios
        echo "Pedido realizado con exito";
      }
    } catch (PDOException $e) {
      $conexion->rollBack();//Si hay fallo vuelve a poner los valores como antes
      die("Fallo en la transaccion:\n".$e->getMessage());
    } finally {
      // Cerrar conexión
      $conexion = null;
    }
    ?>
  </form>
</body>
</html>
