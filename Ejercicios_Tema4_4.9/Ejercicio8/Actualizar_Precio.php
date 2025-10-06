<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Actualizar Precio por CODIGO_ART</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Actualizar Precio por CODIGO_ART</h1>
  <form method="post" action="">
    <label for="codigo">Codigo Articulo</label>
    <input type="number" name="codigo" placeholder="Codigo Articulo">
    <label for="precio">Precio Nuevo</label>
    <input type="number" name="precio" placeholder="ACT precio">
    <button type="submit">ACT.</button>
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

    if(isset($_POST['codigo'],$_POST['precio'])){
      $precio=mysqli_escape_string($conexion,$_POST['precio']);
      $codigo=mysqli_escape_string($conexion,$_POST['codigo']);

      $Act="UPDATE productos SET PRECIO=? WHERE CODIGO_ART=?";
      $stmt=@mysqli_prepare($conexion,$Act);

      mysqli_stmt_bind_param($stmt,"di",$precio,$codigo);

      if(mysqli_stmt_execute($stmt)){
        echo "Articulo con el codigo $codigo actualizado a $precio €";
      }else{
        die("Error en el UPDATE: ".mysqli_error($conexion));
      }
    }
  ?>
</body>
</html>
