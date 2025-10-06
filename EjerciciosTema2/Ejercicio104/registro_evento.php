<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Array asociativo</title>
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
  <form action="" method="post">
    <h2>Agregar Nombre</h2>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>
    <button type="submit">Agregar</button>
  </form>

  <form action="" method="post">
    <h2>Eliminar Participante</h2>
    <label for="posicion">Posición a eliminar (0 a n):</label>
    <input type="number" name="posicion" min="0" required><br>
    <button type="submit">Eliminar</button>
  </form>

  <div class="resultado">
    <?php
      // Lista de nombres
      $nombres = ["Ana", "Carlos", "Beatriz", "Jorge"];

      // Si se envió un nuevo nombre, lo agregamos al array
      if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $nombres[] = $_POST['nombre'];
      }

      // Si se envió una posición para eliminar
      if (isset($_POST['posicion']) && is_numeric($_POST['posicion'])) {
        $posicion = (int)$_POST['posicion'];

        // Validamos que la posición esté dentro del rango del array
        if ($posicion >= 0 && $posicion < count($nombres)) {
          unset($nombres[$posicion]); // Eliminamos el elemento
          $nombres = array_values($nombres); // Reindexamos el array
          echo "Participante eliminado correctamente.<br><br>";
        } else {
          echo "Posición inválida.<br><br>";
        }
      }

      // Mostrar lista de nombres actualizada
      echo "<h3>Lista de Participantes:</h3>";
      foreach ($nombres as $index => $nombre) {
        echo "Posición $index: $nombre<br>";
      }
    ?>
  </div>
</body>
</html>
