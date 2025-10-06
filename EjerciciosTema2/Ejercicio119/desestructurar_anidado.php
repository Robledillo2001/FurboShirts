<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Desestructurar Anidado</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      padding: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
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
       $array=[
        "producto"=>"PlayStation 5",
        "detalles"=>[
          "precio"=>550,
          "stock"=>378
        ]
      ];
      /*["detalles"=>$detalles]=$array;
      ["precio"=>$precio,"stock"=>$stock]=$detalles;*/
      ["detalles"=>["precio"=>$precio,"stock"=>$stock]]=$array;
      echo"Precio: $precio<br> Stock: $stock";
    ?>
  </div>
</body>
</html>
