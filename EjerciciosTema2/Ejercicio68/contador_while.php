<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Dia semana Match</title>
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
  <?php
  $contador=0;
    while($contador!=10){
      $contador+=1;
      $i=sqrt($contador);
      echo $i."<br>";
    }
  ?>
</body>
</html>
