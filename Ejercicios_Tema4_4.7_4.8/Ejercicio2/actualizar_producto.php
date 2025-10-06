<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Actualizar Producto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <a href="buscar_producto.php"><button>Volver a Buscar Producto</button></a>
  <?php
      mysqli_report(MYSQLI_REPORT_OFF);
      $conexion = @mysqli_connect('localhost', 'root', '', 'curso_php');

      if (!$conexion) {
          die("Error de conexión: " . mysqli_connect_error());
      }

      if (isset($_POST['codigo'], $_POST['nombre'], $_POST['precio'], $_POST['pais'])) {
          $codigo = mysqli_escape_string($conexion, $_POST['codigo']);
          $nombre = mysqli_escape_string($conexion, $_POST['nombre']);
          $precio = mysqli_escape_string($conexion, $_POST['precio']);
          $pais = mysqli_escape_string($conexion, $_POST['pais']);

          if (empty($codigo) || empty($nombre) || empty($precio) || empty($pais)) {
              die("Todos los campos son obligatorios.");
          }
          if (!is_numeric($precio)) {
              die("El precio debe ser un valor numérico.");
          }

          // Consulta de actualización
          $update = "UPDATE productos SET 
                  NOMBRE_ART = '$nombre', 
                  PAIS = '$pais',
                  PRECIO = '$precio' 
                  WHERE CODIGO_ART = '$codigo'";

          $resultado = @mysqli_query($conexion, $update);

          if ($resultado) {
              echo "Producto actualizado exitosamente.";
          } else {
              die("Error al actualizar el producto: " . mysqli_error($conexion));
          }
      } else {
          die("No se recibieron los datos necesarios.");
      }
  ?>
</body>
</html>
