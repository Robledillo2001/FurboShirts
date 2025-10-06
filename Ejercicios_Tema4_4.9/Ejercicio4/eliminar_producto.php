<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Buscar por nombre</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Buscar User por Nombre</h1>
  <form method="post" action="">
    <label for="codigo">Codigo de articulo</label>
    <input type="text" name="codigo" placeholder="Ingrese un codigo">
    <BUTTon type="submit">Eliminar</BUTTon>
  </form>
  <hr>
  <?php
  // Configuración de conexión a la base de datos
    mysqli_report(MYSQLI_REPORT_OFF);
    $conexion=@mysqli_connect("localhost","root","","curso_php");
    if(!$conexion){
        die("Error en la conexion: ".mysqli_connect_error());
    }

    if(isset($_POST['codigo'])){
        $codigo=mysqli_escape_string($conexion,(int)$_POST['codigo']);

        $consulta="DELETE FROM productos WHERE CODIGO_ART=?";
        $eliminar=@mysqli_prepare($conexion,$consulta);

        if($eliminar){
          mysqli_stmt_bind_param($eliminar, "i",$codigo);

          if(mysqli_stmt_execute($eliminar)){
            echo "Producto eliminado";
          }else{
            die("Error en la eliminacion: ".mysqli_error($conexion));
          }
        }else{
          die("Error en la consulta ".mysqli_error($conexion));
        }
    }
    
  ?>
</body>
</html>
