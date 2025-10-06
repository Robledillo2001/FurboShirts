<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Array indexado</title>
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
  <div class="resultado">
    <?php
      $array=[5,10,15,20,25,30,35,40,45,50];

      echo $array[1];

      echo $array[11];

      print_r($array);

      for($i=0;$i<count($array);$i++){
        echo $array[$i]."<BR>";
      }
    ?>
  </div>
</body>
</html>
