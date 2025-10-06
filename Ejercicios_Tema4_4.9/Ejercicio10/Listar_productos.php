<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ordenar por Precio o Nombre</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Ordenar Productos por:</h1>
  <form method="post">
    <label>Seleccionar</label>
    <select name="tipo">
      <option value="PRECIO">Precio</option>
      <option value="NOMBRE_ART">Nombre</option>
    </select><br>
    <button type="submit">Consultar</button>
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

    if(isset($_POST['tipo'])){
      $tipo=mysqli_escape_string($conexion,$_POST['tipo']);

      $select="SELECT * FROM productos ORDER BY $tipo ASC";
      $stmt=@mysqli_prepare($conexion,$select);

      //mysqli_stmt_bind_param($stmt,"s",$tipo);
      mysqli_stmt_execute($stmt);
      $resultado=mysqli_stmt_get_result($stmt);

      if(mysqli_num_rows($resultado)>0){
        while($fila=mysqli_fetch_assoc($resultado)){
          echo "<ul>";
            echo "<li>CODIGO ARTICULO: ".$fila['CODIGO_ART']."</li>";
            echo "<li>NOMBRE ARTICULO: ".$fila['NOMBRE_ART']."</li>";
            echo "<li>PAIS DE ORIGEN: ".$fila['PAIS']."</li>";
            echo "<li>PRECIO: ".$fila['PRECIO']."</li>";
          echo"</ul>";
        }
      }
    }
  ?>
</body>
</html>
