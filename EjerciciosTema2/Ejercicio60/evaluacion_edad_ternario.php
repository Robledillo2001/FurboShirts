<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Calculadora Bonificaciones</title>
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
  <h1>Calculadora Bonificaciones</h1>
  <form action="" method="get"> <!-- Cambiado a método GET y action vacío -->
    <label for="edad">Edad:</label>
    <input type="text" name="edad" >
    <br><br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    if(isset($_GET['edad'])){
      $edad = $_GET['edad'];

      if(is_numeric($edad)){
        if($edad>=18){
          echo "Eres mayor de edad";
        }else{
          echo "Eres menor de edad";
        }
      }
    }
  ?>
</body>
</html>
