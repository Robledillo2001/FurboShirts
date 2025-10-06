<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Filtrar Usuarios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Filtrar Usuarios</h1>
  <form method="post" action="">
    <label for="nombre">Buscar Nombre:</label>
    <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre o parte de él">
    <button type="submit">Filtrar</button>
  </form>
  <hr>
  <?php
  // Configuración de conexión a la base de datos
  $user = "root";
  $pass = "";
  $red = "localhost";
  $BaseDatos = "curso_php";

  $conexion = @mysqli_connect($red, $user, $pass, $BaseDatos);

  if (!$conexion) {
      die("Error al conectar a la base de datos: " . mysqli_connect_error());
  }

  // Verificar si se envió un texto para filtrar
  if (isset($_POST['nombre'])) {
      $nombre = mysqli_real_escape_string($conexion, trim($_POST['nombre']));

      if (empty($nombre)) {
          echo "<p>Error: El campo no puede estar vacío.</p>";
      } else {
          // Consulta para filtrar registros
          $consulta = "SELECT * FROM usuarios WHERE USUARIO LIKE '%$nombre%'";
          $resultado = @mysqli_query($conexion, $consulta);

          // Verificar si la consulta se ejecutó correctamente
          if (!$resultado) {
              echo "<p>Error en la consulta: " . mysqli_error($conexion) . "</p>";
          } elseif (mysqli_num_rows($resultado) > 0) {
              echo "<h2>Resultados:</h2>";
              echo "<table border='1'>
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Email</th>
                      </tr>";
              foreach ($resultado as $fila) {
                  echo "<tr>
                          <td>{$fila['ID']}</td>
                          <td>{$fila['USUARIO']}</td>
                          <td>{$fila['EMAIL']}</td>
                        </tr>";
              }
              echo "</table>";
          } else {
              echo "<p>No se encontraron resultados para '$nombre'.</p>";
          }
      }
  }

  // Cerrar la conexión
  mysqli_close($conexion);
  ?>
</body>
</html>
