<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>require</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
    require("configuracion_critica.php");
    $baseDatos="MariaDB";
    echo ($baseDatos);
    /*
        Se usa 'require' en lugar de 'include' para archivos importantes porque 'require' 
        detiene el script si el archivo no se encuentra, evitando errores graves.
        'Include' solo genera una advertencia y continúa, lo que puede causar problemas 
        si el archivo es esencial para el funcionamiento.
    */

  ?>
</body>
</html>
