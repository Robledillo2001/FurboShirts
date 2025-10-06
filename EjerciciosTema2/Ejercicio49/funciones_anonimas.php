<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Superglobales en formularios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<style>
  form {
    text-align: justify;
    font-size: 23px;
  }
</style>
<body>
  <?php
    function ejecutarOperacion($num1,$num2,$operacion){
      return $operacion($num1,$num2);
    }
    $suma = ejecutarOperacion(10, 5, function($a, $b) {
      return $a + $b;
    });
    echo $suma."<br>";
    $resta = ejecutarOperacion(10, 5, function($a, $b) {
      return $a - $b;
    });
    echo $resta."<br>";
    $mult = ejecutarOperacion(10, 5, function($a, $b) {
      return $a * $b;
    });
    echo $mult."<br>";
    $div = ejecutarOperacion(10, 5, function($a, $b) {
      return $a / $b;
    });
    echo $div."<br>";
  ?>
</body>
</html>
