<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Igualdad e Identidad</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        $numero=3;
        $texto="3";

        if($numero==$texto){
            echo "$numero == $texto";
        }else{
            echo "$numero no = $texto";
        }
        echo "<br>";
        if($numero===$texto){
            echo "$numero son del mismo tipo de valor $texto";
        }else{
            echo "$numero no son del mismo tipo $texto";
        }
    ?>
</body>
</html>
