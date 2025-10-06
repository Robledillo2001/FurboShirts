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
       $colegio=[
        "Alumno 1"=>[
          "Nombre"=>"Ruben",
          "Edad"=>23,
          "Nota"=>7.5
        ],
        "Alumno 2"=>[
          "Nombre"=>"Elena",
          "Edad"=>21,
          "Nota"=>10
        ],
        "Alumno 3"=>[
          "Nombre"=>"David",
          "Edad"=>21,
          "Nota"=>5.7
        ],
       ];
       echo "<table border='1'>";
       echo "<thead>";
       echo "<tr><th>Alumno</th><th>Nombre</th><th>Edad</th><th>Nota</th></tr>";
       echo "</thead>";
       echo "<tbody>";
       
       foreach($colegio as $alumnos => $alumno){
        echo "<tr>";
        echo "<td>$alumnos</td>";  // Nombre del alumno (Alumno 1, Alumno 2, etc.)
        foreach($alumno as $categoria => $valor){
          echo "<td>$valor</td>";  // Valores individuales (Nombre, Edad, Nota)
        }
        echo "</tr>";
       }
       
       echo "</tbody>";
       echo "</table>";
    ?>
  </div>
</body>
</html>
