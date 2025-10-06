<?php 
$conexion = new mysqli("localhost", "root", "", "curso_php");

if ($conexion->connect_error) {
  die("Error en la conexión: " . $conexion->connect_error . "<br>");
} else {
  echo "Conexión completada<br>";
}

$id=5;

$act="DELETE FROM productos_1 WHERE ID=?";
$registro=$conexion->prepare($act);

if($registro){
  $registro->bind_param("i",$id);
  $registro->execute();

  if($conexion->affected_rows>0){
    echo "Producto ELIMINADO correctamente.<br>";
  } else {
      echo "No se realizaron cambios en el producto. Puede que no exista un producto con ID = $id";
  }
  $registro->close();
}

$conexion->close();
?>
