<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Buscar por Correo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Buscar User por Emial</h1>
  <form method="post" action="">
    <label for="eamil">Email</label>
    <input type="text" name="email" placeholder="Correo electronico">
    <BUTTon type="submit">BUSCAR</BUTTon>
  </form>
  <hr>
  <?php
    mysqli_report(MYSQLI_REPORT_OFF);
    $conexion=@mysqli_connect("localhost","root","","curso_php");

    if(!$conexion){
      die("Error en la conexion: ".mysqli_connect_error());
    }

    if(isset($_POST['email'])){
      $email=mysqli_escape_string($conexion,$_POST['email']);

      $consulta="SELECT * FROM usuarios WHERE EMAIL=?";
      $seleccion=@mysqli_prepare($conexion,$consulta);

      mysqli_stmt_bind_param($seleccion,"s",$email);
      mysqli_stmt_execute($seleccion);
      $resultado=mysqli_stmt_get_result($seleccion);

      if(mysqli_num_rows($resultado)>0){
        echo "<h2>Usuario<br></h2>";
        while($fila=mysqli_fetch_assoc($resultado)){
          echo "<ul>";
            echo "<li>ID: ".$fila['ID']."</li>";
            echo "<li>NOMBRE: ".$fila['USUARIO']."</li>";
          echo "</ul>";
        }
      }else{
        die("Error en la consulta: ".mysqli_error($conexion));
      }
    }
  ?>
</body>
</html>
