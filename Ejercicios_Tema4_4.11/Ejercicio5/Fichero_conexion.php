<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Buscar por nombre</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
    try {
      // Intento de conexión a la base de datos
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
      file_put_contents("Datos.log", date('Y-m-d H:i:s') . " - " . "CONEXION ESTABLECIDA" . PHP_EOL, FILE_APPEND);
    } catch (PDOException $e) {
      // Si ocurre un error, lo guardamos en un archivo de log
      $error = "ERROR: " . $e->getMessage();
      file_put_contents("Datos.log", date('Y-m-d H:i:s') . " - " . $error . PHP_EOL, FILE_APPEND);
      echo "<h2>Error al conectar. Revisa el archivo de log.</h2>";
    } finally {
      // Cerramos la conexión (aunque PDO la cierra automáticamente al finalizar el script)
      $conexion = null;
    }
  ?>
</body>
</html>
