<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Filtrar Usuarios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Actualizar Usuarios</h1>
  <form method="post" action="">
    <label for="nombre">Act Nombre:</label>
    <input type="text" name="nombre" id="nombre" placeholder="Ingrese un nombre">
    <label for="email">Act. Email:</label>
    <input type="text" name="email" id="email" placeholder="Ingrese un email">
    <label for="id">Buscar ID:</label>
    <input type="text" name="id" id="id" placeholder="Ingrese un ID">
    <button type="submit">Filtrar</button>
  </form>
  <hr>
  <?php
  // Configuración de conexión a la base de datos
  mysqli_report(MYSQLI_REPORT_OFF);
  $user = "root";
  $pass = "";
  $red = "localhost";
  $BaseDatos = "curso_php";

  $conexion = @mysqli_connect($red, $user, $pass, $BaseDatos);

  if (!$conexion) {
      die("Error al conectar a la base de datos: " . mysqli_connect_error());
  }

  if(isset($_POST['nombre'],$_POST['email'],$_POST['id'])){
    $nombre=mysqli_escape_string($conexion,$_POST['nombre']);
    $email=mysqli_escape_string($conexion,$_POST['email']);
    $id=mysqli_escape_string($conexion,$_POST['id']);

    if(empty($id) || !is_numeric($id)){
      die("Por favor, ingrese un ID válido.");
    }
    if(empty($nombre) || empty($email)){
        die("El nombre y el email no pueden estar vacíos.");
    }

    $update="UPDATE usuarios SET
            USUARIO='$nombre',
            EMAIL='$email'
            WHERE ID='$id'";
    $consulta=@mysqli_query($conexion,$update);

    if($consulta){
        echo "El usuario con Nº $id se ha actualizado correctamente";
    }else{
        die("Error en la consulta o el id de usuario no existe".mysqli_error($conexion));
    }
  }
  ?>
</body>
</html>
