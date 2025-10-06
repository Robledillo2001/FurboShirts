<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Promedio</title>
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
<h1>Promedio</h1>
  <form action="" method="get">
    <label for="num1">Número 1:</label>
    <input type="text" name="num1"><br>
    <label for="num2">Número 2:</label>
    <input type="text" name="num2"><br>
    <label for="num3">Número 3:</label>
    <input type="text" name="num3"><br>
    <label for="num4">Número 4:</label>
    <input type="text" name="num4"><br>
    <label for="num5">Número 5:</label>
    <input type="text" name="num5"><br>
    <label for="extraNum">Número extra:</label>
    <input type="text" name="extraNum"><br>
    <button type="submit">ENVIAR</button>
  </form>
  
  <div class="resultado">
    <?php
      // Verificar si los campos están establecidos y no están vacíos
      if (isset($_GET['num1'], $_GET['num2'], $_GET['num3'], $_GET['num4'], $_GET['num5'])) {
        // Asignar valores de los parámetros y validar que sean números
        $num1 = (float)$_GET['num1'];
        $num2 = (float)$_GET['num2'];
        $num3 = (float)$_GET['num3'];
        $num4 = (float)$_GET['num4'];
        $num5 = (float)$_GET['num5'];
        $numExtra = isset($_GET['extraNum']) ? (float)$_GET['extraNum'] : null;

        // Llamar a la función para calcular el promedio
        echo calcularPromedios($num1, $num2, $num3, $num4, $num5) . "<br>";
        
        // Llamar a la función con un número extra
        if ($numExtra !== null) {
          echo calcularPromedios($num1, $num2, $num3, $num4, $num5, $numExtra) . "<br>";
        }
        
        // Llamar a la función sin números
        echo calcularPromedios() . "<br>";
      }

      function calcularPromedios(float ...$numeros) {
        // Manejo de casos de entrada
        if (count($numeros) > 5) {
          return "No se pueden tener más de 5 números.";
        } elseif (count($numeros) == 0) {
          return "No se ha puesto ningún número.";
        }

        // Calcular la suma y el promedio
        $suma = 0;
        for ($i = 0; $i < count($numeros); $i++) {
          $suma += $numeros[$i];
        }
        $promedio = $suma / count($numeros);
        
        // Retornar el resultado formateado
        return "La suma de los " . count($numeros) . " números es de " . number_format($suma, 2) . " y el promedio es de " . number_format($promedio, 2) . ".";
      }
    ?>
  </div>
</body>
</html>
