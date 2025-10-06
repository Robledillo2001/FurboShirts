<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Insertar Usuarios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST">
    <label for="pais">Pais de origen</label>
    <input type="text" name="pais" required><br>
    <label for="precio1">Precio1</label>
    <input type="text" name="precio1" required><br>
    <label for="precio2">Precio2</label>
    <input type="text" name="precio2" required><br>
    <button type="submit">Buscar</button>
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      echo "<h2>Conexión establecida</h2>";

      if(isset($_POST['pais'],$_POST['precio1'],$_POST['precio2'])){
         // Cogemos los valores de productos
         $paisUsuario=$_POST['pais'];
         $precio1=$_POST['precio1'];
         $precio2=$_POST['precio2'];

         //Creamos el INSERT
        $sql = "SELECT * FROM productos WHERE PAIS=? AND PRECIO BETWEEN ? AND ?";
        $stmt = $conexion->prepare($sql);

        $stmt->execute([$paisUsuario,$precio1,$precio2]);

        echo"<table border='1'>
            <tr>
              <td>CODIGO_ART</td>
              <td>NOMBRE_ART</td>
              <td>PRECIO</td>
              <td>PAIS</td>
            </tr>";

        while($fila=$stmt->fetch()){
          echo"<tr>
                  <td>".$fila['CODIGO_ART']."</td>
                  <td>".$fila['NOMBRE_ART']."</td>
                  <td>".$fila['PRECIO']."</td>
                  <td>".$fila['PAIS']."</td>
              </tr>";
        }
        echo"</table>";
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
