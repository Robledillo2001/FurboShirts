<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Verificar y eliminar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      padding: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
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
       $edades=[16, 21, 17, 24, 18, 30, 15];
       $mayores=[];
       $menores=[];

       foreach($edades as $edad){
        
        if($edad>=18){
          $mayores[]=$edad;
        }else{
          $menores[]=$edad;
        }
       }
       print_r($mayores);
       echo"<br>";
       print_r($menores);
       echo"<br>Mayores de edad: ".count($mayores)."<br>Menores de edad: ".count($menores);

    ?>
  </div>
</body>
</html>
