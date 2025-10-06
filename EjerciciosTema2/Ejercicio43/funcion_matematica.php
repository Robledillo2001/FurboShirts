<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Funcion_matematica</title>
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
      define("Descuento",0.5);
      function aplicarDescuento($precio){
        $precioFinal=$precio*Descuento;

        echo $precioFinal;
      }
      aplicarDescuento(400);
  ?>
</body>
</html>
