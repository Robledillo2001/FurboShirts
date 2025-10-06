<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Calculadora Bonificaciones</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
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
  <h1>Calculadora Bonificaciones</h1>
  <form action="" method="get"> <!-- Cambiado a método GET y action vacío -->
    <label for="salario">Salario:</label>
    <input type="text" name="salario" >
    <br><br>
    <label for="antiguedad">Antigüedad:</label>
    <input type="text" name="antiguedad" >
    <br><br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    if(isset($_GET['salario']) && isset($_GET['antiguedad'])){
      $salario = $_GET['salario'];
      $antiguedad = $_GET['antiguedad'];

      if(is_numeric($salario) && is_numeric($antiguedad)){
        if($salario > 2000 && $antiguedad > 5){
          echo "<p>Antigüedad de $antiguedad años y salario de $salario €<br>";
          echo "Total: ".($salario / 0.5)." €</p>";
        } elseif($salario <= 2000 && $antiguedad > 3) { // CORRECCIÓN AQUÍ
          echo "<p>Antigüedad de $antiguedad años y salario de $salario €<br>";
          echo "Total: ".($salario / 0.05)." €</p>";
        } else {
          echo "<p>Antigüedad de $antiguedad años y salario de $salario €<br>";
          echo "Total: $salario €</p>";
        }
      } else {
        echo "<p>Por favor, ingresa valores numéricos válidos para el salario y la antigüedad.</p>";
      }
    }
  ?>
</body>
</html>
