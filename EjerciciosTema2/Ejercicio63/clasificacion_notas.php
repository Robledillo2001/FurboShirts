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
  <h1>Notas Switch Case</h1>
  <form action="" method="get"> <!-- Cambiado a método GET y action vacío -->
    <label for="nota">nota:</label>
    <input type="text" name="nota" >
    <br><br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    if(isset($_GET['nota'])){
      $nota = $_GET['nota'];

      if(is_numeric($nota)){
        switch($nota){
          case 0:
            echo "Insuficiente";
            break;
          case 1:
            echo "Insuficiente";
            break;
          case 2:
            echo "Insuficiente";
            break;
          case 3:
            echo "Insuficiente";
            break;
          case 4:
            echo "Insuficiente";
            break;
          case 5:
            echo "Suficiente";
            break;
            case 6:
              echo "Suficiente";
              break;
            case 7:
              echo "Notable";
              break;
            case 8:
              echo "Notable";
              break;
            case 9:
              echo "Sobresaliente";
              break;
            case 10:
              echo "Sobresaliente";
              break;
            default:
              echo "ESCRIBE DEL 0-10";
              break;
        }
      }
    }
  ?>
</body>
</html>
