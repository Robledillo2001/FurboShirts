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
  <div class="resultado">
    <?php
       $empresa=[
        "Empleado 1"=>[
          "nombre"=>"Ruben",
          "cargo"=>"Programador web",
          "salario"=>1200
        ],

        "Empleado 2"=>[
          "nombre"=>"David",
          "cargo"=>"Programador web",
          "salario"=>2000
        ],

        "Empleado 3"=>[
          "nombre"=>"Elena",
          "cargo"=>"Trabajadora Social",
          "salario"=>900
        ],
       ];

       foreach($empresa as $empleados=>$empleado){
        echo"$empleados<br>";
        foreach($empleado as $clave=>$valor){
          if($clave=="salario"){
            $valor+=$valor*0.10;
          }
          echo "$clave:$valor<br>";
        }
        echo"<br><br>";
       }
    ?>
  </div>
</body>
</html>
