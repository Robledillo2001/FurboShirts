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
     $cursos=[
        "Curso 1"=>[
            "Nombre"=>"DAW",
            "Horas"=>100,
            "Estudiantes"=>21
        ],
        "Curso 2"=>[
            "Nombre"=>"DAM",
            "Horas"=>98,
            "Estudiantes"=>17
        ],
        "Curso 3"=>[
            "Nombre"=>"ASIR",
            "Horas"=>73,
            "Estudiantes"=>33
        ]
     ];

     foreach($cursos as $curso=>$categoria){
        echo"$curso <br>";
        foreach($categoria as $elemento=>$valor){
            echo "$elemento: $valor<br>";
        }
        echo "<br>";
     }
    ?>
  </div>
</body>
</html>
