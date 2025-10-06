<?php
declare(strict_types=1);
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Lista de la compra</title>
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
  <h1>Lista de la compra</h1>
  <form method="POST">
    <label for="producto">Producto:</label>
    <input type="text" name="producto"><br>
    <label for="cantidad">Cantidad:</label>
    <input type="text" name="cantidad"><br>
    <button type="submit">Enviar!</button>
  </form>
  
  <div class="resultado">
    <?php
      if(isset($_POST['producto'],$_POST['cantidad'])){
        $producto=(string)$_POST['producto'];
        $cantidad=(int)$_POST['cantidad'];
        $_SESSION['carrito'][]=[
          "producto"=>$producto,
          "cantidad"=>$cantidad
        ];

        $sumaProductos=0;

        if(!empty($_SESSION['carrito'])){
          echo "Objeto \t cantidad<br>";
          foreach($_SESSION['carrito']as $elemento){
            $sumaProductos+=$elemento['cantidad'];
            echo $elemento['producto'] . "\t" . $elemento['cantidad'] . "<br>";
          }
          echo"<br> Total:$sumaProductos";
        }else{
          echo "No hay productos todavia";
        }
      }
    ?>
  </div>
</body>
</html>
