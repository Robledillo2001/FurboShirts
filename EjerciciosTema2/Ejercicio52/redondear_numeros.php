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
   $numero=7.8976;

   echo round($numero,0);
   echo "<br>";
   echo round($numero,2);
   echo "<br>";
   echo round($numero,3);

  ?>
</body>
</html>
