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
        $nombre1="Juan";
        $nombre2="Pedro";
        if(strcasecmp($nombre1,$nombre2)==0){//0 es que es true y si es true devolvera el echo del if y si no el del else
            echo "Los nombres son iguales";
        }else{
            echo "Los nombres no son iguales";
        }
    ?>
</body>
</html>
