<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Contar por Pais</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST">
      <label>Pais:</label>
      <input type="text"name="pais">
      <button type="submit">Buscar Productos</button>
</form>
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      echo "<h2>Conexión establecida</h2>";

      if(isset($_POST['pais'])){
        $pais=$_POST['pais'];

        $sql="SELECT COUNT(*)AS productos FROM productos WHERE PAIS=?";
        $stmt=$conexion->prepare($sql);

        $stmt->execute([$pais]);
        while($fila=$stmt->fetch()){
          echo "<a>Numero de Productos de $pais: <b>".$fila['productos']."</b></a>";
        }
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
