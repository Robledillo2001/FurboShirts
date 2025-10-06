<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Array asociativo</title>
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
  <form action=""method="post">
    <h2>Productos</h2>
    <label for="producto">Nuevo producto</label>
    <input type="text" name="producto"><br>
    <button type="submit">Enviar</button>
  </form>
  <div class="resultado">
    <?php
     $productos=[
      "Producto A"=>15,
      "Producto B"=>30,
      "Producto C"=>50
     ];

     foreach($productos as $producto=>$cantidad){
      echo "$producto tiene la cantidad de $cantidad elementos<br>";
     }
     echo"<br><br><br>";
     if(isset($_POST['producto'])){
      if(is_numeric($_POST['producto'])){
        $productos['Producto D']=$_POST['producto'];
        foreach($productos as $producto=>$cantidad){
          echo "$producto tiene la cantidad de $cantidad elementos<br>";
         }
      }else{
        echo "Debes escribir un numero";
      }
     }
    ?>
  </div>
</body>
</html>
