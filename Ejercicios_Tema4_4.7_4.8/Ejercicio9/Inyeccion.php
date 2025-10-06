<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Act Producto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Inyeccion para borrar tabla</h1>
  <form method="post">
    <label for="id_pedido">ID Pedido</label>
    <input type="number" name="id_pedido"><br>
    <button type="submit">Inyectar</button>
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
  
  if(isset($_POST['id_pedido'])){
    $id=mysqli_escape_string($conexion,$_POST['id_pedido']);
    //Consulta vulnerable a inyeccion
    $delete = "DELETE FROM pedidos WHERE ID_PEDIDO=$id OR 1=1; DROP TABLE pedidos;";
    $resultado=@mysqli_query($conexion,$delete);
    //Usamos multi_query porque le estamos pidiendo dos consultas a la vez
    if(mysqli_multi_query($conexion,$delete)){
      echo "PEDIDOS ELIMINADOS!";
    }else{
      die("Error en la inyeccion: ". mysqli_error($conexion));
    }
  }
?>
</body>
</html>
