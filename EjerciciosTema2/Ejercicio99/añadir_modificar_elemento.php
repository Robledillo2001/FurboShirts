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
  <form action=""method="post">
    <label for="numero">Numero</label>
    <input type="text" name="numero">
    <button type="submit">Enviar</button>
  </form>
  <div class="resultado">
    <?php
      $array=[8,12,16,22,30];
      
      echo "Array antes: ";
      print_r($array);

      echo"<br>";
      
      if(isset($_POST['numero'])){
        $nuevo_valor=$_POST['numero'];
        if(is_numeric($nuevo_valor)){
          $array[]=$nuevo_valor;

          echo"Array ahora: ";
          print_r($array);
        }else{
          echo"Debes escribi un NUMERO!!!!";
        }
      }
    ?>
  </div>
</body>
</html>
