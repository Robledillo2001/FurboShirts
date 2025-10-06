<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Factorial for</title>
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
  <form action="" method="get">
    <label for="num1">Numero</label>
    <input type="text" name="num1"><br>
    <button type="submit">Ordenar</button>
  </form>
  <div  class="resultado">
  <?php
    if(isset($_GET['num1'])){
      $num1=$_GET['num1'];
      if(is_numeric($num1)){
        $factorial=1;
        for($i=1;$i<=$num1;$i++){
          $factorial*=$i;
        }
        echo"El factorial de $num1 es de $factorial";
      }else{
        echo "No es un numero";
      }
    }
  ?>
  </div>
</body>
</html>
