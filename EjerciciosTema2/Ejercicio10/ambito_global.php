<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ambito global</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
    $ciudad="Madrid";

    function mostrarNombre(){
      global $ciudad;  
      $ciudad="Barcelona";
        echo $ciudad;
    }
    mostrarNombre();
    echo "<br>";
    echo $ciudad;
  ?>
</body>
</html>
