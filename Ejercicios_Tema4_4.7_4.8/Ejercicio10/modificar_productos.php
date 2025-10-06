<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Act Producto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>GESTIÓN DE PRODUCTOS</h1>
  <form method="post">
    <label for="codigo_art">CÓDIGO ARTÍCULO (PARA BORRAR O ACTUALIZAR)</label>
    <input type="text" name="codigo_art"><br>

    <label for="nombre">NOMBRE Producto (PARA AÑADIR O ACTUALIZAR)</label>
    <input type="text" name="nombre"><br>

    <label for="pais">PAÍS (PARA AÑADIR O ACTUALIZAR)</label>
    <input type="text" name="pais"><br>

    <label for="precio">PRECIO (PARA AÑADIR O ACTUALIZAR)</label>
    <input type="text" name="precio"><br>

    <button type="submit" name="insertar">Insertar Producto</button>
    <button type="submit" name="borrar">Borrar Producto</button>
    <button type="submit" name="actualizar">Actualizar Producto</button>
    <hr>
  </form>

  <?php
  // Deshabilita reportes innecesarios de errores de MySQLi
  mysqli_report(MYSQLI_REPORT_OFF);

  // Conexión a la base de datos
  $conexion = @mysqli_connect("localhost", "root", "", "curso_php");

  if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
  }

  // Verifica si se recibieron datos desde el formulario
  if (isset($_POST['nombre'], $_POST['pais'], $_POST['precio'])) {
    // Sanitización básica de los datos
    $nombre = mysqli_escape_string($conexion, trim($_POST['nombre']));
    $pais = mysqli_escape_string($conexion, trim($_POST['pais']));
    $precio = mysqli_escape_string($conexion, trim($_POST['precio']));

    // Inserción de producto
    if (isset($_POST['insertar'])) {
      if (!empty($nombre) && !empty($pais) && is_numeric($precio)) {
        $insert = "INSERT INTO productos (NOMBRE_ART, PAIS, PRECIO) VALUES ('$nombre', '$pais', '$precio')";
        $resultado = @mysqli_query($conexion, $insert);

        if ($resultado) {
          echo "Producto insertado correctamente.";
        } else {
          die("Error en la inserción: " . mysqli_error($conexion));
        }
      } else {
        echo "Por favor, complete todos los campos correctamente.";
      }
    }

    // Actualización de producto
    if (isset($_POST['actualizar'], $_POST['codigo_art'])) {
      $codigo = mysqli_escape_string($conexion, trim($_POST['codigo_art']));
      if (!empty($codigo) && !empty($nombre) && !empty($pais)) {
        $update = "UPDATE productos SET NOMBRE_ART = '$nombre', PAIS = '$pais', PRECIO = '$precio' WHERE CODIGO_ART = '$codigo'";
        $resultado = @mysqli_query($conexion, $update);

        if ($resultado) {
          echo "Producto actualizado correctamente.";
        } else {
          die("Error en la actualización: " . mysqli_error($conexion));
        }
      } else {
        echo "Por favor, complete todos los campos correctamente para actualizar.";
      }
    }

    // Eliminación de producto
    if (isset($_POST['borrar'], $_POST['codigo_art'])) {
      $codigo = mysqli_escape_string($conexion, trim($_POST['codigo_art']));
      if (!empty($codigo)) {
        $delete = "DELETE FROM productos WHERE CODIGO_ART = '$codigo'";
        $resultado = @mysqli_query($conexion, $delete);

        if ($resultado) {
          echo "Producto eliminado correctamente.";
        } else {
          die("Error en la eliminación: " . mysqli_error($conexion));
        }
      } else {
        echo "Por favor, proporcione un código válido para eliminar.";
      }
    }
  }

  // Cierra la conexión al final
  mysqli_close($conexion);
  ?>
</body>
</html>
