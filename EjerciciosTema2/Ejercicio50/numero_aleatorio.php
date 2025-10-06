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
   function numeroAleatorio(){
       // Genera un número aleatorio entre 1 y 100
       $numero = rand(1, 100);
       // Redondea el número a 2 decimales (en este caso siempre será .00)
       return round($numero, 2);
   }

   // Llama a la función y muestra el resultado
   echo "<div class='resultado'>Número aleatorio generado: " . numeroAleatorio() . "</div>";
  ?>
</body>
</html>
