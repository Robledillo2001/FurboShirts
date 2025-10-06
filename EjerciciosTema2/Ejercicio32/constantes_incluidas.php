<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Include y cosas magicas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        include("config.php");
        echo "<h1>".APP_NAME."</h1><BR><h2>Carpeta del archivo</h2>".__FILE__;
    ?>
</body>
</html>
