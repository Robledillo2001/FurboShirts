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
       $saldo=1000;
       $saldo+=500;

       if($saldo>=1500){
        echo "Saldo suficiente";
       }else{
        echo "Saldo insuficiente";
       }
    ?>
</body>
</html>
