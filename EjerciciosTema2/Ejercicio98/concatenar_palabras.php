<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>cONCATENAR PALABRAS</title>
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
      function concatenarPalabras(string...$palabras){
        if(count($palabras)==0){
          return "No hay palabras";
        }
        $concatenacion="";
        foreach($palabras as $palabra){
          $concatenacion.=$palabra." ";
        }
        return $concatenacion;
      }

      echo concatenarPalabras("Ruben","es","la ","BOMBA","!!!!!!!");
      echo "<br>";
      echo concatenarPalabras();
    ?>
  </div>
</body>
</html>
