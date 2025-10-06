<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Errores arrays</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      padding: 20px;
    }
    form {
      margin-bottom: 20px;
      font-size: 23px;
    }
    .resultado {
      margin-top: 20px;
      padding: 15px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 20px;
    }
  </style>
</head>
<body>
  <div class="resultado">
    <?php
      $array=[100,200,300];

      echo $array[4];

      $array=500;

      echo $array[4];

      /*Estos errores se producen porque la posicion 4 no existe todavia en el array. 
      Luego esta intentando dar un valor al array entero sin especificar posicion del mismo*/
    ?>
  </div>
</body>
</html>
