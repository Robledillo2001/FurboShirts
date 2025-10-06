<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Usuarios Activos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
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
    <label for="id">ID</label>
    <input type="number" name="id"><br>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre"><br>
    <label for="email">Email</label>
    <input type="text" name="email"><br>
    <button type="submit" name="visualizar">Visualizar todos los registros</button><br>
    <button type="submit" name="anadir">Añadir elemento</button><br>
    <button type="submit" name="eliminar">Eliminar por id</button><br>
  </form>

  <?php
    if (isset($_POST['visualizar'])) {
      $select = "SELECT * FROM USUARIOS";
      $consulta = mysqli_query($conexion, $select);

      if ($consulta) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Email</th></tr>";

        // Mostrar los registros obtenidos
        while ($datos = mysqli_fetch_assoc($consulta)) {
          echo "<tr>";
          echo "<td>" . $datos['ID'] . "</td>";
          echo "<td>" . $datos['USUARIO'] . "</td>";
          echo "<td>" . $datos['EMAIL'] . "</td>";
          echo "</tr>";
        }

        echo "</table>";
      } else {
        echo "Error en la consulta";
      }
    }

    if (isset($_POST['nombre'], $_POST['email'], $_POST['anadir'])) {
      $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
      $email = mysqli_real_escape_string($conexion, $_POST['email']);

      // Corregir la consulta para insertar datos correctamente
      $Insert = "INSERT INTO USUARIOS(USUARIO, EMAIL) VALUES('$nombre', '$email')";
      $consulta2 = mysqli_query($conexion, $Insert);

      if ($consulta2) {
        echo "Elemento añadido correctamente";
      } else {
        echo "Fallo en la consulta";
      }
    }

    if (isset($_POST['id'], $_POST['eliminar'])) {
      $id = mysqli_real_escape_string($conexion, $_POST['id']);

      // Corregir la consulta de eliminación
      $delete = "DELETE FROM USUARIOS WHERE ID = $id";
      $consulta3 = mysqli_query($conexion, $delete);

      if ($consulta3) {
        echo "Elemento eliminado correctamente";
      } else {
        echo "Fallo en la consulta";
      }
    }
  ?>
</body>
</html>
