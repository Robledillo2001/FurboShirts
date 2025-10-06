<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Login</title>
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
    <form method="post">
        <label for="temp">Tº</label>
        <input type="text" name="temp"><br>
        <button type="submit">Envair</button>
    </form>
  <div class="resultado">
    <?php
        function mostrarTemperatura(float $celsius):float{
          return($celsius*9/5)+32;
        }
        if(isset($_POST['temp'])){
          $temperatura=(float)$_POST['temp'];
          if(is_numeric($temperatura)){
            $resultado=(float)mostrarTemperatura($temperatura);
            echo "Temperatura en Fahrenheit $resultado";
          }else{
            echo "Usa un numero";
          }
        }
    ?>

  </div>
</body>
</html>
