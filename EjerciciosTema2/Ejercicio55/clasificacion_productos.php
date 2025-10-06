<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Calculadora Global</title>
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
  <h1>Clasificación de Productos</h1>
  <form action="" method="get"> <!-- Cambiado a método GET y action vacío -->
    <label for="producto">Nombre del Producto:</label>
    <input type="text" name="producto" id="producto" required>
    <br><br>
    <label for="precio">Precio:</label>
    <input type="text" name="precio" id="precio" required>
    <br><br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    // Verifica si los parámetros están establecidos
    if (isset($_GET['producto']) && isset($_GET['precio'])) {
      $precio = $_GET['precio'];
      $producto = htmlspecialchars($_GET['producto']); // Sanitiza el input del producto

      // Verifica si el precio es numérico
      if (is_numeric($precio)) {
        // Conversión de precio a tipo float para comparación
        $precio = floatval($precio);
        
        // Clasificación del precio
        if ($precio < 20) {
            echo "<div class='resultado'>El precio de $producto es de $precio y es un producto barato.</div>";
        } elseif ($precio >= 20 && $precio <= 50) {
            echo "<div class='resultado'>El precio de $producto es de $precio y es un producto de precio medio.</div>";
        } else {
            echo "<div class='resultado'>El precio de $producto es de $precio y es un producto caro.</div>";
        }
      } else {
          echo "<div class='resultado'>$precio no es un número válido.</div>";
      }
    }
  ?>
</body>
</html>
