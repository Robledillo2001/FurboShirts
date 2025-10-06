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
    function mostrarNombres($nombres){
      foreach($nombres as $nombre){
        echo "Nombre: $nombre<br>";
      }
    }
    $nombres = ["Ruben", "David", "Elena"];
    mostrarNombres($nombres);
  ?>
</body>
</html>
