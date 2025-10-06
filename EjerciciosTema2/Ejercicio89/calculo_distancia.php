<?php
  declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Calcular Coordenadas</title>
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
<h1>Calcular Distancia entre dos Coordenadas</h1>
  <form action="" method="get">
    <label for="x1">Coordenada X1</label>
    <input type="text" name="x1" required><br>
    <label for="y1">Coordenada Y1</label>
    <input type="text" name="y1" required><br>
    <label for="x2">Coordenada X2</label>
    <input type="text" name="x2" required><br>
    <label for="y2">Coordenada Y2</label>
    <input type="text" name="y2" required><br>
    <button type="submit">CALCULAR!!!</button>
  </form>
  
  <div class="resultado">
    <?php
      function calcularCoordenadas(float $x1, float $y1, float $x2, float $y2): float{
        $distancia = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
        return $distancia;
      }

      if (isset($_GET['x1'], $_GET['y1'], $_GET['x2'], $_GET['y2'])) {
        // Convertir los parámetros a valores flotantes y validar
        $x1 = $_GET['x1'];
        $y1 = $_GET['y1'];
        $x2 = $_GET['x2'];
        $y2 = $_GET['y2'];

        if (is_numeric($x1) && is_numeric($y1) && is_numeric($x2) && is_numeric($y2)) {
          $x1 = (float) $x1;
          $y1 = (float) $y1;
          $x2 = (float) $x2;
          $y2 = (float) $y2;

          $distancia=calcularCoordenadas($x1,$x2,$y1,$y2);
          echo "La distancia entre los puntos ($x1, $y1) y ($x2, $y2) es: " . round($distancia, 2) . " unidades.";
        } else {
          echo "Por favor, ingrese valores numéricos válidos para las coordenadas.";
        }
      }
    ?>
  </div>
</body>
</html>
