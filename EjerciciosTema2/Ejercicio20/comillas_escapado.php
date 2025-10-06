<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Interpolacion y Escapado de comillas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        $frase = 'El profesor dijo: "PHP es fácil de aprender".';
        echo "$frase <br>";

        $frase_escapada = "El profesor dijo: \"PHP es fácil de aprender\".";

        echo $frase_escapada;
    ?>
</body>
</html>
