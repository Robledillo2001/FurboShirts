<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Act Producto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Buscar Productos por rango de Precio</h1>
  <form method="post">
    <label for="precio">Porcentaje Precio</label>
    <input type="number" name="precio"><br>
    <button type="submit">Act. productos</button>
    <hr>
  </form>
  <?php
  mysqli_report(MYSQLI_REPORT_OFF);
  $conexion=@mysqli_connect("localhost","root","","curso_php");
  if(!$conexion){
    die("Error en la conexion de la BSD: ".mysqli_connect_error());
  }
  if(isset($_POST['precio'])&&!empty($_POST['precio'])){
    $porcentaje=$_POST['precio']/100;
    $precio=mysqli_escape_string($conexion,$porcentaje);

    $update="UPDATE productos
              SET PRECIO=PRECIO*(1+$precio)
              WHERE PRECIO<20";
    $consulta=@mysqli_query($conexion,$update);

    if($consulta){
      echo "El precio del producto cambio";
    }else{
      die("Fallo en la actualizacion del precio: ".mysqli_error($conexion));
    }
  }
  
?>
</body>
</html>
