<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>SUma estatica</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
     function sumaAcumulativa($numero){
        static $total=0;
        $totalAnt=$total;
        $total=$total+$numero;
        echo "La suma total de $totalAnt y $numero es de $total <br>";
     }

     $numero=14;

     sumaAcumulativa($numero);
     sumaAcumulativa($numero);
     sumaAcumulativa($numero);
  ?>
</body>
</html>
