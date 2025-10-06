<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>include</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
    echo $saludo;
    include("variables_externas.php");
    echo $saludo;
  ?>
</body>
</html>
