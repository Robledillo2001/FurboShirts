<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Act Usuario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>GESTIÓN DE USUARIOS</h1>
  <form method="post">
    <!-- Campo para el ID, usado en actualizar o borrar -->
    <label for="id">ID USUARIO (PARA BORRAR O ACTUALIZAR)</label>
    <input type="text" name="id"><br>

    <!-- Campo para el nombre del usuario -->
    <label for="usuario">NOMBRE USUARIO (PARA AÑADIR O ACTUALIZAR)</label>
    <input type="text" name="usuario"><br>

    <!-- Campo para el email -->
    <label for="email">EMAIL (PARA AÑADIR O ACTUALIZAR)</label>
    <input type="text" name="email"><br>

    <!-- Botones para las acciones -->
    <button type="submit" name="insertar">Insertar Usuario</button>
    <button type="submit" name="borrar">Borrar Usuario</button>
    <button type="submit" name="actualizar">Actualizar Usuario</button>
    <hr>
  </form>

  <?php
  // Desactiva los reportes de errores de MySQLi
  mysqli_report(MYSQLI_REPORT_OFF);

  // Conexión a la base de datos
  $conexion = @mysqli_connect("localhost", "root", "", "curso_php");

  // Verifica si la conexión falló
  if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
  }

  // Verifica si se enviaron los datos mínimos del formulario
  if (isset($_POST['usuario'], $_POST['email'])) {
    // Sanitización básica de los datos para evitar inyección SQL
    $usuario = mysqli_escape_string($conexion, trim($_POST['usuario']));
    $email = mysqli_escape_string($conexion, trim($_POST['email']));

    // Inserción de usuario
    if (isset($_POST['insertar'])) {
      if (!empty($usuario) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $insert = "INSERT INTO usuarios (USUARIO, EMAIL) VALUES ('$usuario', '$email')";
        $resultado = @mysqli_query($conexion, $insert);

        if ($resultado) {
          echo "Usuario insertado correctamente.";
        } else {
          die("Error en la inserción: " . mysqli_error($conexion));
        }
      } else {
        echo "Por favor, complete todos los campos correctamente.";
      }
    }

    // Actualización de usuario
    if (isset($_POST['actualizar'], $_POST['id'])) {
      $id = mysqli_escape_string($conexion, trim($_POST['id']));
      if (!empty($id) && !empty($usuario) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $update = "UPDATE usuarios SET USUARIO = '$usuario', EMAIL = '$email' WHERE ID = '$id'";
        $resultado = @mysqli_query($conexion, $update);

        if ($resultado) {
          echo "Usuario actualizado correctamente.";
        } else {
          die("Error en la actualización: " . mysqli_error($conexion));
        }
      } else {
        echo "Por favor, complete todos los campos correctamente para actualizar.";
      }
    }

    // Eliminación de usuario
    if (isset($_POST['borrar'], $_POST['id'])) {
      $id = mysqli_escape_string($conexion, trim($_POST['id']));
      if (!empty($id)) {
        $delete = "DELETE FROM usuarios WHERE ID = '$id'";
        $resultado = @mysqli_query($conexion, $delete);

        if ($resultado) {
          echo "Usuario eliminado correctamente.";
        } else {
          die("Error en la eliminación: " . mysqli_error($conexion));
        }
      } else {
        echo "Por favor, proporcione un ID válido para eliminar.";
      }
    }
  }

  // Cierra la conexión a la base de datos
  mysqli_close($conexion);
  ?>
</body>
</html>
