<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Juego de Adivinanza Infinito</title>
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
  <h1>Juego de Adivinanza Infinito</h1>
  <form action="" method="get">
    <label for="numero">Ingresa un número entre 1 y 5:</label>
    <input type="text" name="numero" required><br>
    <button type="submit">Adivinar</button>
  </form>
  
  <div class="resultado">
    <?php
      // Generar un número aleatorio entre 1 y 5
      $numeroAdivina = rand(1, 5);
      
      // Verificar si se ha enviado un número
      if (isset($_GET['numero'])) {
          $numero = $_GET['numero'];
          
          // Validar si el input es un número y está en el rango correcto
          if (is_numeric($numero) && $numero >= 1 && $numero <= 5) {
              // Comparar el número ingresado con el número aleatorio
              if ($numero == $numeroAdivina) {
                  echo "<p>¡Correcto! Adivinaste el número $numeroAdivina.</p>";
              } else {
                  echo "<p>Incorrecto. El número correcto era $numeroAdivina. Inténtalo de nuevo.</p>";
              }
          } else {
              echo "<p>Por favor, ingresa un número válido entre 1 y 5.</p>";
          }
      }
    ?>
  </div>
</body>
</html>
