<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Multiple inserción de usuarios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<h1>Multiple inserción de usuarios</h1>
  <form method="post" action="">
    <label for="insertar">Nº Inserts</label>
    <input type="text" name="insertar" placeholder="Número de inserciones" required>
    <button type="submit">Insertar</button>
  </form>
  <hr>
  <?php
    // Activar los informes de error para depuración (opcional)
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    // Conectar a la base de datos
    $conexion = @mysqli_connect("localhost", "root", "", "curso_php");

    if (!$conexion) {
      die("Error en la conexión: " . mysqli_connect_error());
    }
    // Comprobar si se ha enviado el formulario y si la variable 'insertar' es un número
    if (isset($_POST['insertar']) && is_numeric($_POST['insertar'])) {
      $numero = (int)$_POST['insertar']; // Obtener el número de inserciones

      // Preparar la consulta de inserción
      $inserccion = "INSERT INTO usuarios(USUARIO, EMAIL) VALUES(?, ?)";
      $consulta = @mysqli_prepare($conexion, $inserccion);
      
      if ($consulta) {
        // Insertar el número de usuarios especificados
        for ($i = 0; $i < $numero; $i++) {
          $nombre = "Toni " . ($i + 1); // Nombre dinámico para cada usuario
          $email = "ToniMontana" . ($i + 1) . "@coca.es"; // Email dinámico para cada usuario

          // Vincular los parámetros y ejecutar la consulta
          mysqli_stmt_bind_param($consulta, "ss", $nombre, $email);
          mysqli_stmt_execute($consulta);
        }
        echo "<p>Usuarios insertados correctamente.</p>";
      } else {
        die("Error en el INSERT: " . mysqli_error($conexion));
      }
    } else {
      echo "<p>Por favor, ingresa un número válido.</p>";
    }

    // Cerrar la conexión
    mysqli_close($conexion);
  ?>
</body>
</html>
