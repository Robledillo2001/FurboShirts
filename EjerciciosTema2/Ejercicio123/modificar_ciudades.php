<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Verificar y eliminar</title>
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
       $ciudades=["Madrid", "Barcelona", "Valencia", "Sevilla", "Bilbao"];
       echo"Ciudades Antes<br>";
       print_r($ciudades);
       unset($ciudades[2]);
       $ciudades[]="Malaga";
       echo"<br>Arrays ahora <br>";
       $contador=0;
       foreach($ciudades as $ciudad){
        echo"$contador.$ciudad<br>";
        $contador++;
       }
    ?>
  </div>
</body>
</html>
