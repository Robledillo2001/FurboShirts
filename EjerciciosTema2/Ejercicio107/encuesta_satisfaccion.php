<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Array asociativo</title>
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
      $clientes=[5,4,3,5,2];
      $media=0;
      $suma=0;
      for($i=0;$i<count($clientes);$i++){
        echo$clientes[$i]."<br>";
        $suma+=$clientes[$i];
      }
      $media=$suma/count($clientes);
      echo"La media de de las valoraciones de los clientes es de $media";
    ?>
  </div>
</body>
</html>
