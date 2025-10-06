<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Funcion string</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        function saludar($nombre){
            echo "Hola $nombre ¡Bienvenido a PHP!";
        }

        saludar("Ruben");
    ?>
</body>
</html>
