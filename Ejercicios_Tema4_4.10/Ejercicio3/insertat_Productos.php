<?php 
$conexion = new mysqli("localhost", "root", "", "curso_php");

if ($conexion->connect_error) {
  die("Error en la conexión: " . $conexion->connect_error . "<br>");
} else {
  echo "Conexión completada<br>";
}

// Datos para insertar
$productos = [
  ['nombre' => 'Producto 1', 'precio' => 10.50, 'stock' => 20],
  ['nombre' => 'Producto 2', 'precio' => 15.75, 'stock' => 35],
  ['nombre' => 'Producto 3', 'precio' => 8.99, 'stock' => 50],
  ['nombre' => 'Producto 4', 'precio' => 22.30, 'stock' => 15],
  ['nombre' => 'Producto 5', 'precio' => 12.00, 'stock' => 40],
];

foreach ($productos as $producto) {
  $nombre = $producto['nombre'];
  $precio = $producto['precio'];
  $stock = $producto['stock'];

  // Verificar si el producto ya existe (asegúrate de que el nombre de columna coincida)
  $check = "SELECT COUNT(*) as count FROM productos_1 WHERE NOMBRE = '$nombre'";
  $result = $conexion->query($check);
  $row = $result->fetch_assoc();

  if ($row['count'] == 0) {
    // Insertar solo si no existe
    $insert = "INSERT INTO productos_1 (NOMBRE, PRECIO, STOCK) 
               VALUES ('$nombre', $precio, $stock)";
    $consulta = $conexion->query($insert);

    if ($consulta) {
      echo "Producto '$nombre' INSERTADO<br>";
    } else {
      echo "Error al insertar '$nombre': " . $conexion->error . "<br>";
    }
  } else {
    echo "Producto '$nombre' ya existe, no se inserta<br>";
  }
}

$conexion->close();
?>
