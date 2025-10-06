<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>cArray asociativo</title>
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
    <h2>Empleado array</h2>
    <?php
      $empleados=[
        "Nombre"=>"Ruben",
        "Puesto"=>"Programador",
        "Email"=>"Ruben25@gamil.com",
        "Salario"=>3000
      ];

      foreach($empleados as $empleado=>$valor){
        echo"$empleado:$valor <br>";
      }

      $empleados["Salario"]=10000000;
      echo "<h2><br>Empleado con el valor del salario cambiado<br><br></h2>";
      foreach($empleados as $empleado=>$valor){
        echo"$empleado:$valor <br>";
      }
    ?>
  </div>
</body>
</html>
