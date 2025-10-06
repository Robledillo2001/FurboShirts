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
    $contraseña="";
    $host="localhost";
    $bsd="curso_php";
  
    $conexion=mysqli_connect($host,$user,$contraseña,$bsd);

    if(!$conexion){
      die("Conexion fallida: ".mysqli_connect_error());
    }else{
      echo "Conectado a la BSD";
    }
    $eliminar="DELETE FROM usuarios WHERE usuario='JUAN PEREZ'";
    $consulta = mysqli_query($conexion, $eliminar);
    echo"<BR>";
    if($consulta){
      echo "JUAN PEREZ YA NO EXISTE";
    }else{
      echo"ERROR EN LA CONSULTA";
    }
  ?>
</body>
</html>
