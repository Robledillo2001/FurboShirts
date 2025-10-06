<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Calculadora Global</title>
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
  <h1>Clasificación de Productos</h1>
  <form action="" method="get"> <!-- Cambiado a método GET y action vacío -->
    <label for="clases">Clases Totales:</label>
    <input type="text" name="clases" id="producto" required>
    <br><br>
    <label for="asistencia">Clases asistidas:</label>
    <input type="text" name="asistencia" id="precio" required>
    <br><br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    if(isset($_GET['clases'])&&isset($_GET['asistencia'])){
      $clases=$_GET['clases'];
      $asistencia=$_GET['asistencia'];

      $totalAsistencia=($asistencia/$clases)*100;

      if($totalAsistencia>=75){
        echo "Asistencia satisfactoria $totalAsistencia";
      }elseif($totalAsistencia>=50||$totalAsistencia<=75){
        echo "Asistencia regular $totalAsistencia";
      }elseif($totalAsistencia<50){
        echo "Asistencia insuficiente $totalAsistencia";
      }
    }
  ?>
</body>
</html>
