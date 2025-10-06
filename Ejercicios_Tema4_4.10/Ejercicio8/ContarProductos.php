<?php 
$conexion = new mysqli("localhost", "root", "", "curso_php");

if ($conexion->connect_error) {
  die("Error en la conexión: " . $conexion->connect_error . "<br>");
} else {
  echo "Conexión completada<br>";
}

$id=5;

$act="SELECT COUNT(*) FROM productos_1";
$registro=$conexion->prepare($act);

if($registro){
  $registro->execute();

  $resultado=$registro->get_result();

  if($resultado->num_rows>0){
    while($fila=$resultado->fetch_assoc()){
      echo "Numero de Productos: ".$fila['COUNT(*)'];
    }
  }
  
  $registro->close();
}

$conexion->close();
?>
