<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Actualizar Precio por CODIGO_ART</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Numero de usuarios en total</h1>
  <?php
    // Activar los informes de error para depuración (opcional)
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    // Conectar a la base de datos
    $conexion = @mysqli_connect("localhost", "root", "", "curso_php");

    if (!$conexion) {
      die("Error en la conexión: " . mysqli_connect_error());
    }

    $select="SELECT COUNT(*) FROM usuarios";
    $stmt=@mysqli_prepare($conexion,$select);

    mysqli_stmt_execute($stmt);
    $resultado=mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($resultado)>0){
      while($fila=mysqli_fetch_assoc($resultado)){
        echo "<H2>Numero de Usuarios=".$fila['COUNT(*)']."</H2>";
      }
    }
  ?>
</body>
</html>
