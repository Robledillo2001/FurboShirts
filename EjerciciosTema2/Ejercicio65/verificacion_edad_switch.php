<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Notas Switch Case</title>
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
  <form action="" method="get">
    <label for="edad">Edad:</label>
    <input type="text" name="edad" required>
    <br><br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    if(isset($_GET['edad'])){
      $edad = $_GET['edad'];

      // Verificamos que la entrada sea numérica
      if(is_numeric($edad)) {
        $edad = (int)$edad; // Convertimos a entero

        // Usamos switch con true para evaluar condiciones
        switch (true) {
          case ($edad < 18):
            echo "<p>Menor de edad</p>";
            break;
          case ($edad >= 18 && $edad <= 30):
            echo "<p>Joven adulto</p>";
            break;
          case ($edad > 30 && $edad <= 60):
            echo "<p>Adulto</p>";
            break;
          case ($edad > 60):
            echo "<p>Persona mayor</p>";
            break;
          default:
            echo "<p>Error en la edad</p>";
        }
      } else {
        echo "<p>Por favor, ingresa un número válido.</p>";
      }
    }
  ?>
</body>
</html>
