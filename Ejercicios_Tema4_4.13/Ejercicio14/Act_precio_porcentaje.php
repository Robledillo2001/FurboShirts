<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Actualizar POr precio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST">
      <label>PORCENTAJE PRECIO:</label>
      <input type="text"name="porcentaje">
      <button type="submit">Actualizar</button>
</form>
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      echo "<h2>Conexión establecida</h2>";

      if(isset($_POST['porcentaje'])){
        $porcentaje=($_POST['porcentaje']/100)+1;

        $sql="UPDATE productos_1 SET PRECIO=PRECIO*? WHERE PRECIO<50";
        $stmt=$conexion->prepare($sql);

        $stmt->execute([$porcentaje]);
        echo "Productos actualizados";
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
