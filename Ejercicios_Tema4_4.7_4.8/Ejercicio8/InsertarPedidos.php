<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Act Producto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Insertar Pedido</h1>
  <form method="post">
    <label for="id_user">ID usuario</label>
    <input type="number" name="id_user"><br>
    <label for="codigo">Codigo Articulo</label>
    <input type="number" name="codigo"><br>
    <label for="codigo">Cantidad</label>
    <input type="number" name="cantidad"><br>
    <button type="submit">Act. productos</button>
    <hr>
  </form>
  <?php
  /*Tabla de pedidos
    CREATE TABLE IF NOT EXISTS PEDIDOS (
    ID_PEDIDO INT AUTO_INCREMENT PRIMARY KEY,
    ID_USUARIO INT NOT NULL,
    CODIGO_ART INT NOT NULL,
    CANTIDAD INT NOT NULL,
    FOREIGN KEY (ID_USUARIO) REFERENCES usuarios(ID),
    FOREIGN KEY (CODIGO_ART) REFERENCES productos(CODIGO_ART)
    );
  */
  mysqli_report(MYSQLI_REPORT_OFF);
  $conexion=@mysqli_connect("localhost","root","","curso_php");
  if(!$conexion){
    die("Error en la conexion de la BSD: ".mysqli_connect_error());
  }
  
  if(isset($_POST['id_user'],$_POST['codigo'],$_POST['cantidad'])&&!empty($_POST['codigo'])&&!empty($_POST['id_user'])){
    $id=mysqli_escape_string($conexion,$_POST['id_user']);
    $codigo=mysqli_escape_string($conexion,$_POST['codigo']);
    $cantidad=mysqli_escape_string($conexion,$_POST['cantidad']);

    $selectID="SELECT ID FROM usuarios WHERE ID=$id";
    $consultaID=@mysqli_query($conexion,$selectID);
    
    $selectCod="SELECT CODIGO_ART FROM productos WHERE CODIGO_ART=$codigo";
    $consultaCod=@mysqli_query($conexion,$selectCod);

    if($consultaID && mysqli_num_rows($consultaID) > 0 && $consultaCod && mysqli_num_rows($consultaCod) > 0){
      $insert = "INSERT INTO PEDIDOS (ID_USUARIO, CODIGO_ART, CANTIDAD) VALUES ($id, '$codigo', $cantidad)";
      $registrarPedido = @mysqli_query($conexion, $insert);
      if($registrarPedido){
        echo "Pedido registrado correctamente";
      }else{
        die("Fallo en la inserccion ".mysqli_error($conexion));
      }
    }else{
      die("Fallo en alguna de las consultas".mysqli_error($conexion));
    }

  }
?>
</body>
</html>
