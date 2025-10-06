<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Recuperar Producto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Buscar Productos por rango de Precio</h1>
  <form method="post">
    <label for="codigo">Precio Articulo</label>
    <input type="number" name="precio"><br>
    <label for="codigo">Precio2 Articulo</label>
    <input type="number" name="precio2"><br>
    <button type="submit">Buscar productos</button>
    <hr>
  </form>
  <?php
  mysqli_report(MYSQLI_REPORT_OFF);
  $conexion=@mysqli_connect("localhost","root","","curso_php");
  if(!$conexion){
    die("Error en la conexion de la BSD: ".mysqli_connect_error());
  }

  if(isset($_POST['precio'],$_POST['precio2'])&&!empty($_POST['precio'])&&!empty($_POST['precio2'])&&$_POST['precio']<$_POST['precio2']){
    $precio=mysqli_escape_string($conexion,$_POST['precio']);
    $precio2=mysqli_escape_string($conexion,$_POST['precio2']);

    $select="SELECT * FROM productos WHERE PRECIO BETWEEN $precio AND $precio2";
    $consulta=@mysqli_query($conexion,$select);

    if($consulta){
      echo "<table border='1'>
              <tr>
                <th>CODIGO ARTICULO</th>
                <th>NOMBRE ARTICULO</th>
                <th>PAIS</th>
                <th>PRECIO</th>
              </tr>";
      foreach($consulta as $clave){
        echo "<tr>";
          echo "<td>".$clave['CODIGO_ART']."</td>";
          echo "<td>".$clave['NOMBRE_ART']."</td>";
          echo "<td>".$clave['PAIS']."</td>";
          echo "<td>".$clave['PRECIO']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }else{
      die("Error en la eliminacion ".mysqli_error($conexion));
    }
  }else{
    echo "Fallo en la capturacion de los precios";
  }
?>
</body>
</html>
