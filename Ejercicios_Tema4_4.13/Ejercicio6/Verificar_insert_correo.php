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
    <label for="Usuario">Usuario</label>
    <input type="text" name="Usuario" required><br>
    <label for="Email">Email</label>
    <input type="text" name="Email" required><br>
    <button type="submit">Insertar</button>
    <?php
    try {
      // Conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      echo "<h2>Conexión establecida</h2>";

      if(isset($_POST['Email'],$_POST['Usuario'])){
         // Cogemos los valores de l usuario
         $usuario=$_POST['Usuario'];
         $email=$_POST['Email'];

         //Creamos el INSERT
        $sqlInsert = "INSERT usuarios(USUARIO,EMAIL)VALUES(?,?)";
        $resultadoInsert = $conexion->prepare($sqlInsert);

        //Y la select para ver si hay algun correo igual que el que le pasamos
        $slqSelect="SELECT COUNT(*)FROM usuarios WHERE EMAIL=?";
        $resultadoSelect=$conexion->prepare($slqSelect);
        $resultadoSelect->execute([$email]);
        $contador=$resultadoSelect->fetchColumn();
        
        if($contador>0){
          echo"Ya existe un correo y no se puede insertar el usuario";
        }else{
          $resultadoInsert->execute([$usuario,$email]);
          echo "Usuario insertado";
        }
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
