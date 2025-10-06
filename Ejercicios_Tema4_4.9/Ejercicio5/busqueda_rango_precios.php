<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Buscar por Rango de precio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <h1>Buscar User por Nombre</h1>
  <form method="post" action="">
    <label for="rango1">Rango de precio</label>
    <input type="number" name="rango1" placeholder="Rango precio">
    <label for="rango2">Rango de precio</label>
    <input type="number" name="rango2" placeholder="Rango precio">
    <BUTTon type="submit">BUSCAR</BUTTon>
  </form>
  <hr>
  <?php
  // Configuración de conexión a la base de datos
    mysqli_report(MYSQLI_REPORT_OFF);
    $conexion=@mysqli_connect("localhost","root","","curso_php");
    if(!$conexion){
        die("Error en la conexion: ".mysqli_connect_error());
    }

    if(isset($_POST['rango1'],$_POST['rango2'])){
        $rango1=mysqli_escape_string($conexion,(int)$_POST['rango1']);
        $rango2=mysqli_escape_string($conexion,(int)$_POST['rango2']);

        $consulta="SELECT * FROM productos WHERE PRECIO BETWEEN ? AND ?";
        $buscar=@mysqli_prepare($conexion,$consulta);

        mysqli_stmt_bind_param($buscar,"ii",$rango1,$rango2);

        mysqli_stmt_execute($buscar);
        $resultado=mysqli_stmt_get_result($buscar);

        if(mysqli_num_rows($resultado)>0){
          echo "<h1>Productos Encontrados</h1>";
          $i=0;
          while($fila=mysqli_fetch_assoc($resultado)){
            $i+=1;
            echo "<h2>Producto $i</h2>";
            echo "<ul>";
                echo "<li>Nombre: ".$fila["NOMBRE_ART"]."</li>";
                echo "<li> PAIS DE ORIGEN: ".$fila["PAIS"]."</li>";
                echo "<li>Precio ".$fila["PRECIO"]."€</li>";
            echo "</ul>";
          }
        }else{
          die("No se encontraron porductos: ".mysqli_error($conexion));
        }
    }
    
  ?>
</body>
</html>
