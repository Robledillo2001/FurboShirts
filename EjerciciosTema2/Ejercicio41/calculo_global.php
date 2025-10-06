<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>calculo_global</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<style>
  form{
    text-align: justify;
    font-size: 23px;
  }
</style>
<body>
  <?php
    $resultadoGlobal;
    define("TASA",0.15);
    function calcularDescuento($precio,$descuento){
      global $resultadoGlobal;
      $precioConDescuento=$precio-($precio*($descuento/100));
      $precioFinal=$precioConDescuento+($precioConDescuento*TASA);
      $resultadoGlobal=$precioFinal;
    }
    calcularDescuento(850,42);
    echo "El precio total con el descuento es de $resultadoGlobal";
  ?>
</body>
</html>
