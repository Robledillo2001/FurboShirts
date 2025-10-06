<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Declaracio y uso de strings</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        $nombre="Juan";
        $saludo="¡Hola!";

        echo $saludo.$nombre;

        echo "<br>El nombre es $nombre";

        echo '<br>El nombre es $nombre';
    ?>
</body>
</html>
