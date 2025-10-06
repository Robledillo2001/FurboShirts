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
  <h1>Calcular Coordenadas</h1>
  <form action="" method="get">
    <label for="cod1">Coordenada1</label>
    <input type="text" name="cod1" ><br>
    <label for="cod2">Coordenada2</label>
    <input type="text" name="cod2"><br>
    <button type="submit">CALCULAR!!!</button>
  </form>
  
  <div class="resultado">
    <?php
      function calcularCoordenadas(&$x,&$y){
       $x+=10;
       $y+=10;

       return "($x,$y)";
      }

      if (isset($_GET['cod1']) && isset($_GET['cod2'])) {
        $x=$_GET['cod1'];
        $y=$_GET['cod2'];
        if (is_numeric($x) && is_numeric($y)) {
          // Modificar las coordenadas
          $resultado = calcularCoordenadas($x, $y);
          // Mostrar el resultado
          echo "Las coordenadas son: " . $resultado;
        } else {
          echo "¡Por favor, ingrese números válidos en ambos campos!";
        }
      }
    ?>
  </div>
</body>
</html>
