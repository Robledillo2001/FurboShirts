<?php
  declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Funcion NOta</title>
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
<h1>NOta publicar</h1>
  <form action="" method="get">
    <label for="nota">NOta</label>
    <input type="text" name="nota" required><br>
    <button type="submit">CALCULAR!!!</button>
  </form>
  
  <div class="resultado">
    <?php
      function mostrarNota(float $nota){
        switch (true) {
          case $nota < 5:
            echo "La nota mostrada es INSUFICIENTE --> ".round($nota,2);
            break;
          case $nota >= 5 && $nota < 7:
            echo "La nota mostrada es SUFICIENTE --> ".round($nota,2);
            break;
          case $nota >= 7 && $nota < 9:
            echo "La nota mostrada es NOTABLE --> ".round($nota,2);
            break;
          case $nota >= 9 && $nota <= 10:
            echo "La nota mostrada es SOBRESALIENTE --> ".round($nota,2);
            break;
          default:
            echo "Nota no permitida";
            exit;
        }
      }

      if (isset($_GET['nota'])) {
        // Convertir los parámetros a valores flotantes y validar
        $nota = $_GET['nota'];
        $nota=(float)$nota;

        if (is_numeric($nota)&&$nota>=0&&$nota<=10) {
          $resultado=mostrarNota($nota);
        } else {
          echo "Por favor, ingrese valores numéricos del 1 al 10 para poder mostrar la nota";
        }
      }
    ?>
  </div>
</body>
</html>
