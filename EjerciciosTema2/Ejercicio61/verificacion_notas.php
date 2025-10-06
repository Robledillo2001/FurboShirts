<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Verificación de Notas con Operador Ternario</title>
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
  <h1>NOtas</h1>
  <form action="" method="get"> <!-- Cambiado a método GET y action vacío -->
    <label for="notas">Notas:</label>
    <input type="text" name="notas" >
    <br><br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    if(isset($_GET['notas'])){
      $notas = $_GET['notas'];

      if(is_numeric($notas)){
        if($notas>60||$notas==60){
          echo "Aprobado";
        }else{
          echo "Reprobado";
        }
      }
    }
  ?>
</body>
</html>
