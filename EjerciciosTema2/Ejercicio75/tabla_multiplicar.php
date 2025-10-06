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
    <label for="numero">Numero</label>
    <input type="text" name="numero">
    <button type="submit">Multiplicar</button>
  </form>
  <div  class="resultado">
  <?php
    if(isset($_GET['numero'])){
      $numero=$_GET['numero'];
      if(is_numeric($numero)){
        for($i=0;$i<=10;$i++){
          echo"$numero*$i=".($numero*$i)."<br>";
        }
      }
    }
  ?>
  </div>
</body>
</html>
