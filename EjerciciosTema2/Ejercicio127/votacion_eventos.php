<?php
declare(strict_types=1);
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Votación de Eventos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      padding: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
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
  <h1>Votación de Eventos</h1>
  <form method="POST">
    <p>Selecciona uno de los siguientes eventos:</p>
    <input type="radio" id="evento1" name="evento" value="Concierto de música clásica">
    <label for="evento1">Concierto de música clásica</label><br><br>

    <input type="radio" id="evento2" name="evento" value="Torneo de fútbol">
    <label for="evento2">Torneo de fútbol</label><br><br>

    <input type="radio" id="evento3" name="evento" value="Feria de comida internacional">
    <label for="evento3">Feria de comida internacional</label><br><br>

    <input type="submit" value="Votar">
  </form>
  
  <div class="resultado">
    <?php
    // Inicializar los contadores de votaciones si no existen
    if (!isset($_SESSION['votaciones'])) {
        $_SESSION['votaciones'] = [
          "Concierto de música clásica" => 0,
          "Torneo de fútbol" => 0,
          "Feria de comida internacional" => 0
      ];
    }

    // Si se ha enviado el formulario
    if (isset($_POST['evento'])) {
        $evento = $_POST['evento'];
        
        // Incrementar el contador del evento seleccionado
        if (isset($_SESSION['votaciones'][$evento])) {
          $_SESSION['votaciones'][$evento]++;
        }

        // Mostrar los resultados actualizados
        echo "<h2>Resultados actuales:</h2>";
        echo "<ul>";
        foreach ($_SESSION['votaciones'] as $nombreEvento => $votos) {
          echo "<li>$nombreEvento: $votos votos</li>";
        }
        echo "</ul>";
    }
    ?>
  </div>
</body>
</html>
