<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>comillas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
     $nombre="Ruben";
     echo "Hola, mi nombre es $nombre.";
     //Las comillas simples interpreatn variables y su valor
     echo "<br>";
     echo 'Hola, mi nombre es $nombre.';
     //Las comillas simples no interpretan variables por lo que se inprime tal cual
  ?>
</body>
</html>
