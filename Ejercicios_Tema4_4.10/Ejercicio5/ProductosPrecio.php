<?php 
$conexion = new mysqli("localhost", "root", "", "curso_php");

if ($conexion->connect_error) {
  die("Error en la conexión: " . $conexion->connect_error . "<br>");
} else {
  echo "Conexión completada<br>";
}
$precio=11;
$select="SELECT * FROM productos_1 WHERE PRECIO>?";
$registro=$conexion->prepare($select);



if($registro){
  $registro->bind_param("i",$precio);
  $registro->execute();

  $resultado=$registro->get_result();

  if($resultado->num_rows>0){
    while($fila=$resultado->fetch_assoc()){
      echo "<h2>".$fila['NOMBRE']."</h2>";
      echo"<ul>
            <li>ID: ".$fila['ID']."</li>
            <li>Precio: ".$fila['PRECIO']."</li>
            <li>Stock: ".$fila['STOCK']."</li>
  
      </ul>";
    } 
  }else{
    echo "No hay productos en la tabla o no existe: ".$conexion->error;
  }
}
$conexion->close();
?>
