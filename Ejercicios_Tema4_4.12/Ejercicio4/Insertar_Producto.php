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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      try {
        // Intento de conexión a la base de datos
        $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores como excepciones
        echo "<h2>Conexión establecida</h2>";

        $sql = "INSERT INTO productos_1(NOMBRE, PRECIO, STOCK) VALUES(?, ?, ?)";

        $stmt = $conexion->prepare($sql);

        // Variables a insertar
        $nombre = "Libro de cocina";
        $precio = 47.99;
        $stock = 500;

        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $precio, PDO::PARAM_STR);
        $stmt->bindParam(3, $stock, PDO::PARAM_INT);

        $stmt->execute();

        echo "Inserción completada";

        // Redirigir después de procesar para evitar reenvíos
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
      } catch (PDOException $e) {
        // Si ocurre un error, lo guardamos en un archivo de log
        $error = "ERROR: " . $e->getMessage();
        file_put_contents("error.log", date('Y-m-d H:i:s') . " - " . $error . PHP_EOL, FILE_APPEND);
        echo "<h2>Error al conectar. Revisa el archivo de log.</h2>";
      } finally {
        // Cerramos la conexión (aunque PDO la cierra automáticamente al finalizar el script)
        $conexion = null;
      }
    }
  ?>

  <!-- Formulario para enviar datos manualmente -->
  <form method="post" action="">
    <button type="submit">Insertar Producto</button>
  </form>
</body>
</html>
