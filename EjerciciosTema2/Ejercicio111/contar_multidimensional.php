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
        $estudiantes=[
          "Estudiante 1"=>[
            "DWES"=>7,
            "DWEC"=>6,
            "ENDES"=>6
          ],
          "Estudiante 2"=>[
            "DWES"=>4,
            "DWEC"=>5,
            "ENDES"=>9
          ],
          "Estudiante 3"=>[
            "DWES"=>8,
            "DWEC"=>7,
            "ENDES"=>3
          ]
        ];
        $media=0;
        foreach($estudiantes as $estudiante=>$asignatura){
          echo"$estudiante <br>";
          $suma=0;
          foreach($asignatura as $notas=>$nota){
            echo "$notas:$nota<br>";
            $suma+=$nota;
          }
          $media=$suma/count($asignatura)."<br>";
          echo "<br>";
          echo"$media<br>";
        }
    ?>
  </div>
</body>
</html>
