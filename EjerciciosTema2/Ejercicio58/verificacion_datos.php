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
  <h1>Acceso de Ciudadanos</h1>
  <form action="" method="get"> <!-- Cambiado a método GET y action vacío -->
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"  required>
    <br><br>
    <label for="edad">Edad:</label>
    <input type="text" name="edad" required>
    <br><br>
    <label for="pais">Pais:</label>
    <input type="text" name="pais" required>
    <br><br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    if(isset($_GET['edad'])&&isset($_GET['nombre'])&&isset($_GET['pais'])){
      $nombre=$_GET['nombre'];
      $edad=$_GET['edad'];
      $pais=$_GET['pais'];

      if(is_numeric($edad)){
        if($edad>=18){
          if($pais=="España"){
            echo"<p>Nombre:$nombre<br>Edad:$edad<br>Pais:$pais<br>Acceso permitido</p>";
          }else{
            echo"<p>Nombre:$nombre<br>Edad:$edad<br>Pais:$pais<br>Acceso denegado No es Español</p>";
          }
        }else{
          echo"<p>Nombre:$nombre<br>Edad:$edad<br>Pais:$pais<br>Acceso denegado No es mayor de edad</p>";
        }
      }else{
        echo"<p>$edad no es compatible</p>";
      }
    }
  ?>
</body>
</html>
