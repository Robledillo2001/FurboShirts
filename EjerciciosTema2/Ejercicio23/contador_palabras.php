<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Contador de palabras</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        $texto="Aprender PHP es divertido y util";
        echo $texto;
        echo "<br>".str_word_count($texto);
        $nuevoTexto=str_replace("divertido","fascinante",$texto);

        echo "<br>$nuevoTexto";
    ?>
</body>
</html>
