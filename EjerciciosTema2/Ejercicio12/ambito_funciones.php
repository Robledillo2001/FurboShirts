<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Contador</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
    $contador=10;
    function incrementarContador(){
        $contador++;
        echo "Dentro de la función: $contador<br>";
    }
    incrementarContador();
    echo "Fuera de la función: $contador<br>";
  ?>
</body>
</html>
