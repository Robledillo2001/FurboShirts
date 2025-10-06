<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Audi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST">
    <label for="id">CODIGO ART:</label>
    <input type="text" name="codigo" required><br>
    <label for="precio">Precio ART:</label>
    <input type="text" name="precio" required><br>
    <button type="submit" name="archivar">Insertar Auditoria</button>
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      echo "<h2>Conexión establecida</h2>";
      
      if(isset($_POST['codigo'],$_POST['precio'])){//Sacar datos de la tabla de productos
        $id=$_POST['codigo'];
        $precio=$_POST['precio'];

        $conexion->beginTransaction();//Comenzamos transaccion

        $conexion->exec("UPDATE productos SET PRECIO=$precio WHERE CODIGO_ART=$id");//Restamos la cantidad total del producto
        $conexion->exec("INSERT INTO auditoria(ACCION,CODIGO_ART,FECHA)VALUES('CAMBIO DE PRECIO A $precio',$id,now())");//Insertamos pedidos 

        $conexion->commit();//Guardamos lo cambios
        echo "Auditoria realizada con exito";
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
