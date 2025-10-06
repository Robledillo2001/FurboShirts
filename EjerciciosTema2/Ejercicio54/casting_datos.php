<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Calculadora Global</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
  <style>
    form {
      text-align: justify;
      font-size: 23px;
    }
  </style>
</head>
<body>
  <?php
   $valor="123.45";

   $entero=(int)$valor;

   $decimal=(float)$valor;
   echo $valor;
   echo "<br>";
   echo $decimal;
   echo "<br>";
   echo $entero;
   echo "<br>";
  ?>
</body>
</html>
