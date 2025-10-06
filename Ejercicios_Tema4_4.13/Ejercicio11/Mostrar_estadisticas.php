<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>ESTADISTICAS PRODUCTOS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      echo "<h2>Conexión establecida</h2>";

      $sql="SELECT COUNT(*)AS total_registros, AVG(PRECIO)AS promedio_precio, MAX(PRECIO)AS max_precio FROM productos_1";
      $stmt=$conexion->prepare($sql);

      $stmt->execute();

      echo"<table border='1'>
            <tr>
              <th>Total Productos</th>
              <th>Promedio Precio</th>
              <th>Precio Mas Caro</th>
            </tr>";
      while($fila=$stmt->fetch()){
        echo"<tr>
                <td>".$fila['total_registros']."</td>
                <td>".$fila['promedio_precio']."</td>
                <td>".$fila['max_precio']."</td>
            </tr>";
      }
    } catch (PDOException $e) {
      // Manejo de errores
      die($e->getMessage());
    } finally {
      // Cerrar conexión
      $conexion = null;
    }
    ?>
</body>
</html>
