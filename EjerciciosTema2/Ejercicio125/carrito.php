<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Carrito</title>
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
  <form action="" method="post">
    <label for="producto">Producto:</label>
    <input type="text" name="producto"><br>
    <label for="precio">Precio:</label>
    <input type="text" name="precio"><br>
    <button type="submit">Enviar</button>
  </form>
  <div class="resultado">
    <?php
    session_start();

    // Añadir producto al carrito
    if (isset($_POST['producto'], $_POST['precio'])) {
        $_SESSION['carrito'][] = [
            "producto" => $_POST['producto'],
            "precio" => $_POST['precio'],
        ];
    }

    // Mostrar los productos del carrito
    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        echo "<table>";
        echo "<tr><th>Producto</th><th>Precio</th></tr>";

        foreach ($_SESSION['carrito'] as $item) {
            // Validar que el elemento es un array y tiene las claves 'producto' y 'precio'
            if (is_array($item) && isset($item['producto'], $item['precio'])) {
                echo "<tr>";
                echo "<td>" . $item['producto'] . "</td>";
                echo "<td>" . $item['precio'] . "€</td>";
                echo "</tr>";
            }
        }

        echo "</table>";
    } else {
        echo "No hay productos en el carrito.";
        session_abort();
    }
    ?>
  </div>
</body>
</html>
