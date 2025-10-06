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
        $personas=[
            "1ªPersona"=>[
                "Nombre"=>"Ruben",
                "Edad"=>23,
                "Ciudad"=>"Fuente de Pedro Naharro"
            ],
            "2ªPersona"=>[
                "Nombre"=>"David",
                "Edad"=>21,
                "Ciudad"=>"Villamayor de Santiago"
            ],
            "3ªPersona"=>[
                "Nombre"=>"Elena",
                "Edad"=>21,
                "Ciudad"=>"Villamayor de Santiago"
            ],
        ];

        foreach($personas as $personas=>$tipo){
            echo"$personas<br>";
            foreach($tipo as $elemento=>$valor){
                echo"$elemento:$valor<br>";
            }
            echo"<br>";
        }
    ?>
  </div>
</body>
</html>
