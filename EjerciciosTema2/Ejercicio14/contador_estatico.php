<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Variable estatica en funcion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
    function incrementarContador(){
        static $contador=0;
        $contador++;
        echo $contador."<br>";
    }
    incrementarContador();
    incrementarContador();
    incrementarContador();
    incrementarContador();
  ?>
</body>
</html>
