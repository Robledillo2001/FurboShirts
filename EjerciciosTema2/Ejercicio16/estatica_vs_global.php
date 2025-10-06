<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Global vs statica</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
     $contadorGlobal=0;
    function usarGlobal(){
      global $contadorGlobal;
      $contadorGlobal++;
      echo $contadorGlobal."<br>";
    }

    function usarEstatica(){
      static $contador=0;
      $contador++;
      echo $contador."<br>";
    }

    usarGlobal();
    usarGlobal();
    usarGlobal();

    usarEstatica();
    usarEstatica();
    usarEstatica();

  ?>
</body>
</html>
