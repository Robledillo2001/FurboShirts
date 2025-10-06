<?php 
  mysqli_report(MYSQLI_REPORT_OFF);
  $conexion = @new mysqli("localhost", "root", "", "curso_php");

  if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error . "<br>");
  } else {
    echo "Conexión completada<br>";
  }

  $id=5;

  $act=@"SELECT * FROM productos_1 WHERE ID=5";
  $registro=$conexion->prepare($act);

  if($registro){
    $registro->execute();

    $resultado=$registro->get_result();

    if($resultado->num_rows>0){
      while($fila=$resultado->fetch_assoc()){
        echo "<H2>".$fila['NOMBRE']."</H2>";
        echo"<ul>
            ID:  ".$fila['ID']."
            PRECIO:  ".$fila['PRECIO']."
            STOCK:  ".$fila['STOCK']."
        </ul>";
      }
    }else{
      echo"Error en la consulta: ".$conexion->error;
    }
    
    $registro->close();
  }

  $conexion->close();
?>
