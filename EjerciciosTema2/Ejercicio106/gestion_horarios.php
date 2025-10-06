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
  <form action=""method="post">
    <h2>Horas de trabajo</h2>
    <label for="horas">Horas:</label>
    <input type="text" name="horas"><br>
    <select name="dia">
      <option value="NDIA">Elige un dia...</option>
      <option value="Lunes">Lunes</option>
      <option value="Martes">Martes</option>
      <option value="Miercoles">Miercoles</option>
      <option value="Jueves">Jueves</option>
      <option value="Viernes">Viernes</option>
    </select>
    <button type="submit">Enviar</button>
  </form>
  <div class="resultado">
    <?php
      $dias=[
        "Lunes"=>4,
        "Martes"=>3,
        "Miercoles"=>4,
        "Jueves"=>4,
        "Viernes"=>3
      ];

      foreach($dias as $dia=>$horas){
        echo"El $dia tiene $horas horas de trabajo <br>";
      }

      echo "<br><br><br>";

      if(isset($_POST['dia'],$_POST['horas'])){
        $Nhoras=$_POST['horas'];
        $dia=$_POST['dia'];

        if(is_numeric($horas)){
          switch($dia){
            case "Lunes":
              $dias["Lunes"]=$Nhoras;
              break;
            case "Martes":
              $dias["Martes"]=$Nhoras;
              break;
            case "Miercoles":
              $dias["Miercoles"]=$Nhoras;
              break;
            case "Jueves":
              $dias["Jueves"]=$Nhoras;
              break;
            case "Viernes":
              $dias["Viernes"]=$Nhoras;
              break;
            default:
              echo"No se eligio dia";
            exit;
          }
          foreach($dias as $dia=>$horas){
            echo"El $dia tiene $horas horas de trabajo <br>";
          }
        }else{
          echo"Se debe elegir un Numero";
        }
      }
    ?>
  </div>
</body>
</html>
