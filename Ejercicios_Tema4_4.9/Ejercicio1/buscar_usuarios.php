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
    <label for="nombre">Act Nombre:</label>
    <input type="text" name="nombre" id="nombre" placeholder="Ingrese un nombre">
    <button type="submit">Filtrar</button>
  </form>
  <hr>
  <?php
  // Configuración de conexión a la base de datos
    mysqli_report(MYSQLI_REPORT_OFF);
    $conexion=@mysqli_connect("localhost","root","","curso_php");
    if(!$conexion){
        die("Error en la conexion: ".mysqli_connect_error());
    }

    if(isset($_POST['nombre'])){
        $nombre=mysqli_escape_string($conexion,$_POST['nombre']);

        $consulta=@mysqli_prepare($conexion,"SELECT * FROM usuarios WHERE USUARIO=?");

        if(!$consulta){
            die("Error en la consulta: ".mysqli_error($conexion));
        }

        mysqli_stmt_bind_param($consulta,"s",$nombre);

        mysqli_stmt_execute($consulta);

        $resultado=mysqli_stmt_get_result($consulta);

        if( $resultado && mysqli_num_rows($resultado)>0){
            foreach($resultado as $fila){
                echo "ID: ".$fila['ID']."<br>";
                echo "NOMBRE: ".$fila['USUARIO']."<br>";
                echo "EMAIL: ".$fila['EMAIL']."<br>";
            }
        }else{
            die("Error en la busqueda del usuario:". mysqli_error($conexion));
        }
    }
  ?>
</body>
</html>
