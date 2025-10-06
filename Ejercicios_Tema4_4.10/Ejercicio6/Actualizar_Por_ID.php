<?php 
$conexion = new mysqli("localhost", "root", "", "curso_php");

if ($conexion->connect_error) {
  die("Error en la conexión: " . $conexion->connect_error . "<br>");
} else {
  echo "Conexión completada<br>";
}

$stock=23;
$id=4;

$act="UPDATE productos_1 SET STOCK=? WHERE ID=?";
$registro=$conexion->prepare($act);

if($registro){
  $registro->bind_param("ii",$stock,$id);
  $registro->execute();

  if($conexion->affected_rows>0){
    echo "Producto actualizado correctamente.<br>";
  } else {
      echo "No se realizaron cambios en el producto. Puede que no exista un producto con ID = $id o que el STOCK ya sea $stock.<br>";
  }
  $registro->close();
}

$conexion->close();
?>
