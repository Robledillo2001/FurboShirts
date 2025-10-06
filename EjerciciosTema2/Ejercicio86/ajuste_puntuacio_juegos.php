<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>PUNTUACION</title>
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
  <h1>Puntuacion Juegos</h1>
  <form action="" method="get">
    <label for="punt">Inventario Inicial</label>
    <input type="text" name="punt" ><br>
    <button type="submit">PUNTUAR!!!</button>
  </form>
  
  <div class="resultado">
    <?php
      function puntuacionJugador(&$puntos){
        if($puntos>1000){
          $puntos/=0.2;
        }else{
          $puntos=$puntos;
        }
        return $puntos;
      }

      if(isset($_GET['punt'])){
        $puntuacion=$_GET['punt'];

        if(is_numeric($puntuacion)){
          puntuacionJugador($puntuacion);
          echo"Puntuacion realizada: $puntuacion";
        }else{
          echo"No se puede ver la puntuacion sin Nºs";
        }

      }
    ?>
  </div>
</body>
</html>
