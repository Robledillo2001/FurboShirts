<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Diferencia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        function esMayorDeEdad($edad){
            if($edad>=18){
                echo "Es mayor de edad--->$edad";
            }else{
                echo "Es menor de edad--->$edad";
            }
        }

        esMayorDeEdad(20);
        echo "<br>";
        esMayorDeEdad(16);
    ?>
</body>
</html>
