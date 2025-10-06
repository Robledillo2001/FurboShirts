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
            echo"<table border='1'>
                  <tr>
                      <th>ID</TH>
                      <th>uSUARIO</TH>
                      <th>CORREO</TH>
                  </TR>";
            $select="SELECT * FROM USUARIOS";
            $listauser=mysqli_query($conexion,$select);
            
            if($listauser){
              foreach($listauser as $item){
                echo "<tr>";
                echo "<td>".$item['ID']."</td>";
                echo "<td>".$item['USUARIO']."</td>";
                echo "<td>".$item['EMAIL']."</td>";
                echo "</tr>";
              }
              echo "</table>";
              echo "<a href='formulario_inserccion.php'>Volver</a>";
            }else{
              die("Error en la seleccion de usuarios".mysqli_error($conexion));
            }
        }else{
            die("Error en el Insert".mysqli_error($conexion));
        }
      }
    } 
  ?>
</body>
</html>
