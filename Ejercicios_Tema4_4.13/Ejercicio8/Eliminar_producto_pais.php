<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>ELiminar Producto por Pais</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST">
    <label for="pais">Pais de origen</label>
    <input type="text" name="pais" required><br>
    <button type="submit">Eliminar</button>
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      echo "<h2>Conexión establecida</h2>";

      if(isset($_POST['pais'])){
         // Cogemos los valores de productos
         $paisProducto=$_POST['pais'];

         //Creamos el INSERT
        $sql = "DELETE FROM productos WHERE PAIS=?";
        $stmt = $conexion->prepare($sql);

        $stmt->execute([$paisProducto]);
        echo"Productos eliminados";
      }    
    } catch (PDOException $e) {
      // Manejo de errores
      $error = "ERROR: " . $e->getMessage();
      file_put_contents("error.log", date('Y-m-d H:i:s') . " - " . $error . PHP_EOL, FILE_APPEND);
      echo "<h2>Error al conectar. Revisa el archivo de log.</h2>";
    } finally {
      // Cerrar conexión
      $conexion = null;
    }
    ?>
  </form>
</body>
</html>
