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
    <label for="email">Email del Usuario </label>
    <input type="text" name="email" placeholder="Ingrese un emial">
    <label for="id">ID </label>
    <input type="number" name="id" placeholder="Ingrese un ID">
    <BUTTon type="submit">Actualizar</BUTTon>
  </form>
  <hr>
  <?php
  // Configuración de conexión a la base de datos
    mysqli_report(MYSQLI_REPORT_OFF);
    $conexion=@mysqli_connect("localhost","root","","curso_php");
    if(!$conexion){
        die("Error en la conexion: ".mysqli_connect_error());
    }

    if(isset($_POST['id'],$_POST['email'])){
        $id=mysqli_escape_string($conexion,$_POST['id']);
        $email=mysqli_escape_string($conexion,$_POST['email']);

        $consulta="UPDATE usuarios SET EMAIL=? WHERE ID=?";
        $act=@mysqli_prepare($conexion,$consulta);

        mysqli_stmt_bind_param($act, "si", $email, $id);

        if(mysqli_stmt_execute($act)){
          echo "Producto Actualizado";
        }else{
          die("Error en la inserccion: ".mysqli_error($conexion));
        }
    }
    
  ?>
</body>
</html>
