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
  <h1>Descuentos</h1>
  <form action="" method="get"> <!-- Cambiado a método GET y action vacío -->
    <label for="precio">Precio:</label>
    <input type="text" name="precio" >
    <br><br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    if(isset($_GET['precio'])){
      $precio = $_GET['precio'];

      if(is_numeric($precio)){
        if($precio>100){
          echo ($precio*0.10)."€ es el precio total";
        }elseif($precio==100||$precio<100){
          echo ($precio*0.05)."€ es el precio total";
        }
      }
    }
  ?>
</body>
</html>
