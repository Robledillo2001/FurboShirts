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
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"  required>
    <br><br>
    <label for="edad">Edad:</label>
    <input type="text" name="edad" required>
    <br><br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    if(isset($_GET['edad'])&&isset($_GET['nombre'])){
      $edad=$_GET['edad'];
      $nombre=$_GET['nombre'];

      if(is_numeric($edad)){
        if($edad<13){
          echo "<p class='resultado'>La persona de $edad años es un niño</p>";
        }elseif($edad>=13||$edad<=17){
          echo "<p class='resultado'>La persona de $edad años es un adolescente</p>";
        }elseif($edad>=18||$edad<=64){
          echo "<p class='resultado'>La persona de $edad años es un adulto</p>";
        }elseif($edad>=65){ 
          echo "<p class='resultado'>La persona de $edad años es un mayor</p>";
        }
      }else{
        echo $edad." no es compatible";
      }
    }
  ?>
</body>
</html>
