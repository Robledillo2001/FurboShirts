<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Comentarios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php
    $user = "root";
    $contraseña = "";
    $host = "localhost";
    $bsd = "curso_php";
  
    // Conexión a la base de datos
    $conexion = mysqli_connect($host, $user, $contraseña, $bsd);

    if (!$conexion) {
      die("Conexión fallida: " . mysqli_connect_error());
    } else {
      echo "<h1>Conectado a la Base de Datos</h1><br>";
    }
  ?>

  <!-- Formulario HTML -->
  <form action="" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" ><br>
    <label for="email">Email</label>
    <input type="email" name="email" ><br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    // Comprobamos si se enviaron los datos del formulario
    if (isset($_POST['nombre'], $_POST['email'])) {
      $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
      $email = mysqli_real_escape_string($conexion, $_POST['email']);

      // Consulta para contar los registros en la tabla usuarios
      $consultaConteo = "SELECT COUNT(*) AS total FROM usuarios";
      $resultadoConteo = mysqli_query($conexion, $consultaConteo);

      if ($resultadoConteo) {
        $fila = mysqli_fetch_assoc($resultadoConteo);
        $totalRegistros = $fila['total'];
        echo "Registros actuales en la tabla: $totalRegistros<br>";

        // Verificar si se pueden insertar más registros
        if ($totalRegistros >= 10) {
          echo "No se pueden agregar más registros, ya hay 10.<br>";
        } else {
          // Insertar nuevo registro
          $insertar = "INSERT INTO usuarios (USUARIO, EMAIL) VALUES ('$nombre', '$email')";

          if (mysqli_query($conexion, $insertar)) {
            echo "Registro insertado con éxito: $nombre - $email<br>";
          } else {
            echo "Error al insertar el registro: " . mysqli_error($conexion) . "<br>";
          }
        }
      } else {
        echo "Error al contar registros: " . mysqli_error($conexion) . "<br>";
      }
    }

    // Cerrar conexión
    mysqli_close($conexion);
  ?>
</body>
</html>
