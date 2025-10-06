<?php
  declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Lista compra</title>
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
<h1>Lista compra</h1>
  <form action="" method="get">
    <label for="p1">Producto1:</label>
    <input type="text" name="p1"><br>
    <label for="p2">Producto2:</label>
    <input type="text" name="p2"><br>
    <label for="p3">Producto3:</label>
    <input type="text" name="p3"><br>
    <button type="submit">ENVIAR</button>
  </form>
  
  <div class="resultado">
    <?php
      
      if (isset($_GET['p1'],$_GET['p2'],$_GET['p3'])) {
        $producto1 = $_GET['p1'] !== '' ? $_GET['p1'] : "vacio";
        $producto2 = $_GET['p2'] !== '' ? $_GET['p2'] : "vacio";
        $producto3 = $_GET['p3'] !== '' ? $_GET['p3'] : "vacio";

        $resultado=crearListaCompra($producto1,$producto2,$producto3);
        echo $resultado;
      }

      function crearListaCompra(string $p1="vacio",string $p2="vacio",string $p3="vacio"){
        return "Producto 1:$p1<br>Producto 2:$p2<br>Producto 3:$p3";
      }
    ?>
  </div>
</body>
</html>
