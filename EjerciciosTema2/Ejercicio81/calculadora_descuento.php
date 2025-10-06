<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Calcular Descuento</title>
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
    <label for="precio">Ingresa un precio</label>
    <input type="text" name="precio" ><br>
    <label for="desc">Ingresa el Descuento</label>
    <input type="text" name="desc" ><br>
    <button type="submit">Calcular descuento</button>
  </form>
  
  <div class="resultado">
    <?php
      function Descuento($precio,$descuento=0.10){
        if(!is_numeric($descuento)||$descuento<=0||$descuento>=1){
          $descuento=0.10;
        }

        $precioTotal=$precio-($precio*$descuento);
        return $precioTotal;
      }
      if(isset($_GET['precio'])&&isset($_GET['desc'])){
        $resultado= Descuento($_GET['precio'],$_GET['desc']);
        echo"El descuento total es de $resultado €";
      }
    ?>
  </div>
</body>
</html>
