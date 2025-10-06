<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>PI CON VARIABLES ESTATICAS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        define("PI",3.1416);
        function calcularArea($radio){
            static $total=0;
            $area=PI*$radio*$radio;
            $total+=$area;
            echo "El area del circulo es de $total <br>";
        }

        calcularArea(3);
        calcularArea(5);
        calcularArea(7);
    ?>
</body>
</html>
