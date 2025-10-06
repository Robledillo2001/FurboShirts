<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>comentarios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
    $user="root";
    $pass="";
    $red="localhost";
    $BaseDatos="curso_php";

    $conexion=mysqli_connect($red,$user,$pass,$BaseDatos);

    if(isset($_POST['nombre'],$_POST['email'])){
      $nombre=mysqli_escape_string($conexion,$_POST['nombre']);
      $email=mysqli_escape_string($conexion,$_POST['email']);

      if(empty($nombre) || empty($email)){
        die("Campos no deben estar vacios".mysqli_error($conexion));
      }else{
        $insertar="INSERT INTO usuarios(USUARIO,EMAIL) VALUES('$nombre','$email')";
        $consulta=mysqli_query($conexion,$insertar);
        if($consulta){
            echo "Elementos insertados";
        }else{
            die("Error en el Insert".mysqli_error($conexion));
        }
      }
    } 
  ?>
  <a href="formulario_inserccion.php"></a>
</body>
</html>
