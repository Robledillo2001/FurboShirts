<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Recuperar Producto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
    mysqli_report(MYSQLI_REPORT_OFF);
    $conexion = @mysqli_connect('localhost', 'root', '', 'curso_php');

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
  ?>
  <h1>Recuperar Producto</h1>
  <form method="post">
    <label for="codigo">Codigo Articulo</label>
    <input type="text" name="codigo"><br>
    <button type="submit">Recuperar producto</button>
    <hr>
  </form>

  <?php
      if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
        $codigo=mysqli_real_escape_string($conexion,$_POST['codigo']);

        $select="SELECT * FROM productos_eliminados WHERE CODIGO_ART=$codigo";
        $consultar=mysqli_query($conexion,$select);

        if(mysqli_num_rows($consultar)>0){
          $producto=mysqli_fetch_assoc($consultar);

          //Insertar primero en la otra tabla

          $insertarEliminado="INSERT INTO productos(CODIGO_ART,NOMBRE_ART,PAIS,PRECIO) 
                              VALUES (
                                      '".$producto['CODIGO_ART']."' , 
                                      '".$producto['NOMBRE_ART']."' , 
                                      '".$producto['PAIS']."' , 
                                      '".$producto['PRECIO']."'
                              )";
          $insercion=@mysqli_query($conexion,$insertarEliminado);


          $eliminarInsertado="DELETE FROM productos_eliminados WHERE CODIGO_ART=$codigo";
          $eliminar=@mysqli_query($conexion,$eliminarInsertado);

          if($insercion&&$eliminar){
            echo "Elemento eliminado insertado a la antigua tabla de productos";
          }else{
            die("Fallo en alguna de las consultas".mysqli_error($conexion));
          }
        }else{
          die("No se encontro el producto".mysqli_error($conexion));
        }
      }

  ?>
</body>
</html>
