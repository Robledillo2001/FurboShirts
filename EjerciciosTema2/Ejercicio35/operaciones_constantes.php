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
       define("IVA",0.21);
       define("PRECIO_BASE",100);
       function calcularPrecioTotal(){
        static $total=PRECIO_BASE*(1+IVA);
        echo "Total de la compra= <b>$total</b>";
       }
       calcularPrecioTotal();
    ?>
</body>
</html>
