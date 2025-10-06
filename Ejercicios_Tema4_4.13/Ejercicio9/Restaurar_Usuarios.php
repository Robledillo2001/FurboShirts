<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Archivar Usuarios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <form method="POST">
    <label for="id">ID Usuario:</label>
    <input type="text" name="id" required><br>
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" required><br>
    <label for="correo">Correo:</label>
    <input type="text" name="correo" required><br>
    <button type="submit" name="archivar">Archivar Usuario</button>
    <button type="submit" name="restaurar">Restaurar Usuario</button>
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      echo "<h2>Conexión establecida</h2>";

      if(isset($_POST['correo'],$_POST['usuario'],$_POST['id'],$_POST['archivar'])){
         // Cogemos los valores de productos
         $usuario=$_POST['usuario'];
         $id=$_POST['id'];
         $correo=$_POST['correo'];

         //Creamos el INSERT
        $sql = "DELETE FROM usuarios WHERE id=?";
        $stmt = $conexion->prepare($sql);

        $stmt->execute([$id]);
        
        $sql="INSERT INTO usuarios_archivados(ID,USUARIO,EMAIL)VALUES(?,?,?)";
        $stmt=$conexion->prepare($sql);

        $stmt->execute([$id,$usuario,$correo]);
        echo "Usuario Archivado";
      }
      
      if(isset($_POST['correo'],$_POST['usuario'],$_POST['id'],$_POST['restaurar'])){
        // Cogemos los valores de productos
        $usuario=$_POST['usuario'];
        $id=$_POST['id'];
        $correo=$_POST['correo'];

        //Creamos el INSERT
       $sql = "DELETE FROM usuarios_archivados WHERE id=?";
       $stmt = $conexion->prepare($sql);

       $stmt->execute([$id]);
       
       $sql="INSERT INTO usuarios(ID,USUARIO,EMAIL)VALUES(?,?,?)";
       $stmt=$conexion->prepare($sql);

       $stmt->execute([$id,$usuario,$correo]);
       echo "Usuario Restaurado";
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
