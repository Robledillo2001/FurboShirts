<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>buscar pro nombre</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST">
      <label>NOMBRE USUARIO:</label>
      <input type="text"name="nombre">
      <button type="submit">Buscar</button>
</form>
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      echo "<h2>Conexión establecida</h2>";

      if(isset($_POST['nombre'])){
        $nombre=$_POST['nombre'];

        $sql="SELECT * FROM usuarios WHERE USUARIO=?";
        $stmt=$conexion->prepare($sql);

        $stmt->execute([$nombre]);
        echo"<h2>Datos por USUARIO: ".$nombre."</h2>";
        while($fila=$stmt->fetch()){
          echo"<ul>
                <li>".$fila['ID']."</li>
                <li>".$fila['EMAIL']."</li>
              </ul>";
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
