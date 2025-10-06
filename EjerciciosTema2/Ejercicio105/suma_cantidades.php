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
      $productos=[
        "Producto A"=>5,
        "Producto B"=>8,
        "Producto C"=>3
      ];
      $suma=0;
      if(is_array($productos)){
        foreach($productos as $producto=>$cantidad){
          echo"$producto:$cantidad €<br>";
          $suma+=$cantidad;
        }

        echo"La suma total de los prodcutos es de $suma €";
      }
    ?>
  </div>
</body>
</html>
