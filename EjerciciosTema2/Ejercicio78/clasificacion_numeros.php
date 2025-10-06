<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Números Pares</title>
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
  <form action="" method="get">
    <label for="num1">Número:</label>
    <input type="text" name="num1"><br>
    <button type="submit">Ordenar pares</button>
  </form>
  
  <div class="resultado">
    <?php
      if (isset($_GET['num1'])) {
        $numero = $_GET['num1'];
        
        // Verificar si la entrada es numérica
        if (is_numeric($numero)) {
          $numero = intval($numero); // Convertir a entero
          
          // Verificar si el número está en el rango de 1 a 100
          if ($numero >= 1 && $numero <= 100) {
            
            // Verificar si es par
            if ($numero % 2 == 0) {
              echo "<h2>Números pares entre 1 y $numero:</h2>";
              // Bucle para mostrar números pares
              for ($i = 2; $i <= $numero; $i += 2) {
                echo "$i<br>";
              }
            } else {
              echo "<h2>El número ingresado ($numero) no es par.</h2>";
            }
          } else {
            echo "<h2>Por favor, ingresa un número entre 1 y 100.</h2>";
          }
        } else {
          echo "<h2>Por favor, ingresa un valor numérico válido.</h2>";
        }
      }
    ?>
  </div>
</body>
</html>
