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
    <label for="codigo">Codigo_ART: </label>
    <input type="text" name="codigo" placeholder="Ingrese un Codigo de articulo">
    <label for="nombre">Nombre_Art: </label>
    <input type="text" name="nombre" placeholder="Ingrese un Codigo de articulo">
    <label for="pais">PAIS de origen: </label>
    <input type="text" name="pais" placeholder="Ingrese un Codigo de articulo">
    <label for="precio">Precio del producto: </label>
    <input type="text" name="precio" placeholder="Ingrese un Codigo de articulo">
    <button type="submit">Insertar</button>
  </form>
  <hr>
  <?php
  // Configuración de conexión a la base de datos
    mysqli_report(MYSQLI_REPORT_OFF);
    $conexion=@mysqli_connect("localhost","root","","curso_php");
    if(!$conexion){
        die("Error en la conexion: ".mysqli_connect_error());
    }

    if(isset($_POST['codigo'],$_POST['nombre'],$_POST['pais'],$_POST['precio'])){
        $codigo=mysqli_escape_string($conexion,$_POST['codigo']);
        $nombre=mysqli_escape_string($conexion,$_POST['nombre']);
        $pais=mysqli_escape_string($conexion,$_POST['pais']);
        $precio=mysqli_escape_string($conexion,$_POST['precio']);

        $consulta="INSERT INTO productos(CODIGO_ART,NOMBRE_ART,PAIS,PRECIO) VALUES(?,?,?,?)";
        $inserccion=@mysqli_prepare($conexion,$consulta);

        mysqli_stmt_bind_param($inserccion, "issd", $codigo, $nombre, $pais, $precio);

        if(mysqli_stmt_execute($inserccion)){
          echo "Producto insertado";
        }else{
          die("Error en la inserccion: ".mysqli_error($conexion));
        }
    }
    
  ?>
</body>
</html>
