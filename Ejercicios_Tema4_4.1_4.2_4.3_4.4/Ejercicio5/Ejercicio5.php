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

    $select="SELECT * FROM USUARIOS WHERE EMAIL LIKE'%gmail.com'";
    $consulta=mysqli_query($conexion,$select);

    if($consulta){
      echo "<h1>Datos de la tabla de usuarios</h1>";
      echo "<table border='1'>";
        echo"<tr>";
          echo"<th>ID</th>";
          echo"<th>NOMBRE</th>";
          echo"<th>EMAIL</th>";
        echo"<tr>";
      foreach($consulta as $datos){
        echo"<tr>";
          echo"<td>".$datos['ID']."</td>";
          echo"<td>".$datos['USUARIO']."</td>";
          echo"<td>".$datos['EMAIL']."</td>";
        echo"</tr>";
      }
      echo "</table>";
    }
  ?>
</body>
</html>
