<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Eliminar Producto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<h1>Eliminar Producto</h1>
  <?php
    mysqli_report(MYSQLI_REPORT_OFF);
    $conexion = @mysqli_connect('localhost', 'root', '', 'curso_php');

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $tabla_eliminados="CREATE TABLE IF NOT EXISTS PRODUCTOS_ELIMINADOS(
        CODIGO_ART INT PRIMARY KEY,
        NOMBRE_ART VARCHAR(100),
        PAIS VARCHAR(100),
        PRECIO FLOAT
    )";
    $crearTabla=@mysqli_query($conexion,$tabla_eliminados);

    if($crearTabla){
      echo "<h3>Tabla creada</h3>";
    }else{
      die("Fallo al crear Tabla".mysqli_error($conexion));
    }
  ?>
  <form method="post">
    <label for="codigo">Codigo Articulo</label>
    <input type="text" name="codigo"><br>
    <button type="submit">Eliminar Producto y meter en la otra table</button>
    <hr>
  </form>

  <?php
      if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
        $codigo=mysqli_real_escape_string($conexion,$_POST['codigo']);

        $select="SELECT * FROM productos WHERE CODIGO_ART=$codigo";
        $consultar=mysqli_query($conexion,$select);

        if(mysqli_num_rows($consultar)>0){
          $producto=mysqli_fetch_assoc($consultar);

          //Insertar primero en la otra tabla

          $insertarEliminado="INSERT INTO PRODUCTOS_ELIMINADOS(CODIGO_ART,NOMBRE_ART,PAIS,PRECIO) 
                              VALUES (
                                      '".$producto['CODIGO_ART']."' , 
                                      '".$producto['NOMBRE_ART']."' , 
                                      '".$producto['PAIS']."' , 
                                      '".$producto['PRECIO']."'
                              )";
          $insercion=@mysqli_query($conexion,$insertarEliminado);


          $eliminarInsertado="DELETE FROM productos WHERE CODIGO_ART=$codigo";
          $eliminar=@mysqli_query($conexion,$eliminarInsertado);

          if($insercion&&$eliminar){
            echo "Elemento eliminado insertado a la nueva tabla de productos";
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
