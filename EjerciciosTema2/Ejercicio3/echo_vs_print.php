<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>ECHO VS PRINT</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
     echo "PHP es un lenguaje popular.<br>";
     print "PHP es un lenguaje popular.<br>";

     echo "PHP", " es", " un", " lenguaje", " popular.<br>";
     /*print "PHP", " es", " un", " lenguaje", " popular.";
        No se pueden poner comas en print porque solo puede tomar un unico argumento
     */
  ?>
</body>
</html>
