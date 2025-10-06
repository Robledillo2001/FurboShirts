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
        $valor=10;
        $valor2="Juan";
        if($valor!=$valor2){
            echo "Son iguales ";
        }else{
            echo "No son iguales ";
        }

        if($valor!==$valor2){
            echo "Son identicos ";
        }else{
            echo "No son identicos ";
        }
    ?>
</body>
</html>
