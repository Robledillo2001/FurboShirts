<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>While pares</title>
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
    <label for="num1">Numero Inicial</label>
    <input type="text" name="num1"><br>
    <label for="num2">Numero Final</label>
    <input type="text" name="num2"><br>
    <button type="submit">Ordenar</button>
  </form>
  <div  class="resultado">
  <?php
    if(isset($_GET['num1'])&&isset($_GET['num2'])){
      $num1=$_GET['num1'];
      $num2=$_GET['num2'];
      if(is_numeric($num1)&&is_numeric($num2)){
        if($num1>$num2){
          for($i=$num1;$i>=$num2;$i--){
            echo"$i<br>";
          }
        }else{
          echo "Elige otros numeros";
        }
      }else{
        echo "No es un numero";
      }
    }
  ?>
  </div>
</body>
</html>
