<?php
  declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Temperatura</title>
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
<h1>Temperatura</h1>
  <form action="" method="get">
    <label for="temp">Temperatura en celsius</label>
    <input type="text" name="temp" required><br>
    <button type="submit">CALCULAR!!!</button>
  </form>
  
  <div class="resultado">
    <?php
      function mostrarTemperatura(float $celsius){
        return($celsius*9/5)+32;
      }

      if (isset($_GET['temp'])) {
        // Convertir los parámetros a valores flotantes y validar
        $temperatura = $_GET['temp'];
        $temperatura=(float)$temperatura;

        if (is_numeric($temperatura)) {
          $resultado=mostrarTemperatura($temperatura);
          echo"Temperatura en Celsius: $temperatura º<br>";
          echo"Temperatura en Fahrenheit: F $resultado";
        } else {
          echo "Por favor, ingrese valores numéricos del 1 al 10 para poder mostrar la nota";
        }
      }
    ?>
  </div>
</body>
</html>
