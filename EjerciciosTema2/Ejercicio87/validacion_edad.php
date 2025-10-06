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
    <label for="edad">Edad:</label>
    <input type="text" name="edad" ><br>
    <button type="submit">Enviar</button>
  </form>
  
  <div class="resultado">
    <?php
      function edadPersona(&$edad){
        if(($edad>=18)==true){
          return"La edad de $edad es mayor de edad";
        }else{
          return"La edad de $edad es menor de edad";
        }
      }

      if(isset($_GET['edad'])){
        $edad=$_GET['edad'];

        if(is_numeric(($edad))){
          $resultado=edadPersona($edad);
          echo $resultado;
        }else{
          echo"Por favor necesito un numero :-(";
        }
      }
    ?>
  </div>
</body>
</html>
