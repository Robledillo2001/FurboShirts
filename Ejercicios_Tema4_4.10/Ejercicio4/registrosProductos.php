<?php 
$conexion = new mysqli("localhost", "root", "", "curso_php");

if ($conexion->connect_error) {
  die("Error en la conexión: " . $conexion->connect_error . "<br>");
} else {
  echo "Conexión completada<br>";
}
$select="SELECT * FROM productos_1";
$registro=$conexion->query($select);

if($registro->num_rows>0){
  while($fila=$registro->fetch_assoc()){
    echo "<h2>".$fila['NOMBRE']."</h2>";
    echo"<ul>
          <li>ID: ".$fila['ID']."</li>
          <li>Precio: ".$fila['PRECIO']."</li>
          <li>Stock: ".$fila['STOCK']."</li>

    </ul>";
  } 
}

$conexion->close();
?>
