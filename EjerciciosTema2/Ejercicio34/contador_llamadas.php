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
       define("MENSAJE_BIENVENIDA","Bienvenido a PHP!");
       function mostrarMensaje(){
        static $contador=0;
        $contador++;
        if($contador<=1){
          echo MENSAJE_BIENVENIDA.__LINE__;
        }else{
          echo "Llamada nº $contador ".__FILE__;
        }
       }
       mostrarMensaje();
       echo "<br>";
       mostrarMensaje();
       echo "<br>";
       mostrarMensaje();
       echo "<br>";
       mostrarMensaje();
    ?>
</body>
</html>
