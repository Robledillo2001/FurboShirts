<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>llamadas a una function</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
    function contadorLlamadas(){
        static $llamadas=0;
        $llamadas++;
        echo "La funcion se ha llamado $llamadas veces <br>";
    }
    contadorLlamadas();
    contadorLlamadas();
    contadorLlamadas();
  ?>
</body>
</html>
