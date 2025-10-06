<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Reserva Hotel</title>
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
  <h1>Reservas de Hotel</h1>
  <form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"><br>
    <label for="nPer">Personas:</label>
    <input type="text" name="nPer"><br>
    <button type="submit">Reservar</button>
  </form>
  <div class="resultado">
    <?php
      session_start();
      if (isset($_POST['nombre'], $_POST['nPer'])) {
        // Asegurarse de que se trate de un número entero
        $nombre = $_POST['nombre'];
        $nPersonas = (int)$_POST['nPer'];
        
        // Almacenar la reserva en la sesión
        $_SESSION['reservas'][] = [
          "nombre" => $nombre,
          "nPersonas" => $nPersonas
        ];
      }
      if (isset($_SESSION['reservas']) && count($_SESSION['reservas']) > 0) {
        $sumaPersonas = 0;
        echo "<h2>Listado de Reservas</h2>";
        echo "<table><tr><th>Nombre</th><th>Personas</th></tr>";
        foreach ($_SESSION['reservas'] as $reserva) {
          // Sumar el número de personas
          $sumaPersonas += $reserva['nPersonas'];
          echo "<tr><td>" . $reserva['nombre'] . "</td><td>" . $reserva['nPersonas'] . "</td></tr>";
        }
        echo "</table>";
        echo "<p>Total de Personas: $sumaPersonas</p>";
      } else {
        echo "No hay reservas o no se han podido agregar.";
      }
    ?>
  </div>
</body>
</html>
