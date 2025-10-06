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
      $select="SELECT * FROM usuarios WHERE EMAIL LIKE'admin_%'";
      $validar=mysqli_query($conexion,$select);

      if(empty($nombre) || empty($email)){
        die("Campos no deben estar vacios".mysqli_error($conexion));
      }else{
        $insertar="INSERT INTO usuarios(USUARIO,EMAIL) VALUES('$nombre','$email')";
        $consulta=mysqli_query($conexion,$insertar);
        if($consulta){
            if($validar){
              echo "Usuario Insertado con exito";
            }else{
              die("Email no valido debe empezar por admin_");
            }
        }else{
            die("Error en el Insert".mysqli_error($conexion));
        }
      }
    } 
  ?>
</body>
</html>
