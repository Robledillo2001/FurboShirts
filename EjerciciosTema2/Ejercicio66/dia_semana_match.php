<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Dia semana Match</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
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
  <h1>Notas Switch Case</h1>
  <form action="" method="get"> <!-- Cambiado a método GET y action vacío -->
    <label for="dia">Dia:</label>
    <input type="text" name="dia" >
    <br><br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    if(isset($_GET['dia'])){
      $dia=(int)$_GET['dia'];
      $diaSemana=match($dia){
        1=>'Lunes',
        2=>'Martes',
        3=>'Miercoles',
        4=>'Jueves',
        5=>'Viernes',
        6=>'Sabado',
        7=>'Domingo',
        default=>'Numero no valido',
      };

      echo $diaSemana;
    }
  ?>
</body>
</html>
