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
    // Datos de conexión a la base de datos
    $user = "root";
    $contraseña = "";
    $host = "localhost";
    $bsd = "curso_php";
  
    // Conectar a la base de datos
    $conexion = mysqli_connect($host, $user, $contraseña, $bsd);

    if (!$conexion) {
      die("Conexión fallida: " . mysqli_connect_error());
    } else {
      echo "Conectado a la Base de Datos<br>";
    }

    // Verificar si la vista ya existe
    $verificarVista = "SHOW TABLES LIKE 'vista_usuarios_activos'";
    $resultadoVerificacion = mysqli_query($conexion, $verificarVista);

    if (mysqli_num_rows($resultadoVerificacion) == 0) {
      // Si la vista no existe, crearla
      $vista_usuarios_activos = "CREATE VIEW vista_usuarios_activos AS
                                  SELECT ID, USUARIO
                                  FROM usuarios
                                  WHERE EMAIL LIKE '%hotmail.com';";
      $vista = mysqli_query($conexion, $vista_usuarios_activos);

      if ($vista) {
        echo "Vista creada con éxito.<br>";
      } else {
        echo "Fallo en la creación de la vista.<br>";
      }
    } else {
      echo "La vista ya existe.<br>";
    }

    // Consulta a la vista 'vista_usuarios_activos' para obtener los usuarios con email de hotmail
    $consulta = "SELECT * FROM vista_usuarios_activos";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
      echo "<h1>Usuarios con email en hotmail.com</h1>";
      echo "<table border='1'>";
      echo "<tr><th>ID</th><th>Nombre</th></tr>";

      // Mostrar los registros obtenidos
      while ($datos = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $datos['ID'] . "</td>";
        echo "<td>" . $datos['USUARIO'] . "</td>";
        echo "</tr>";
      }
      
      echo "</table>";
    } else {
      echo "Error en la consulta: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
  ?>
</body>
</html>
