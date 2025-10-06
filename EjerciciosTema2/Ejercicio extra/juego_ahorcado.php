<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ahorcado</title>
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
  <h1>Ahorcado</h1>
  <form method="POST">
    <label for="letra">Letra</label>
    <input type="text" id="letra" name="letra" maxlength="1" required><br><br>
    <button type="submit">Adivinar</button>
  </form>
  
  <div class="resultado">
    <?php
      session_start();
      
      // Inicializar las variables de sesión si es necesario
      if (!isset($_SESSION['intentos'], $_SESSION['palabra'])) {
          $_SESSION['intentos'] = 7;
          $_SESSION['palabra'] = "Mazda";  // Puedes cambiar la palabra si lo deseas
          $_SESSION['letras'] = [];
      }

      if (isset($_POST['letra'])) {
          $letra = strtolower($_POST['letra']);  // Convertimos la letra a minúscula

          // Verificamos si es una sola letra
          if (strlen($letra) == 1) {
              // Verificamos si la letra ya se ha intentado antes
              if (in_array($letra, $_SESSION['letras'])) {
                  echo "<br>Ya has intentado la letra: $letra<br>";
              } else {
                  // Agregamos la letra al array de letras usadas, correcta o incorrecta
                  $_SESSION['letras'][] = $letra;

                  // Verificamos si la letra está en la palabra
                  if (strpos(strtolower($_SESSION['palabra']), $letra) !== false) {
                      echo "¡Has acertado una letra! ---> $letra<br>";
                  } else {
                      $_SESSION['intentos']--;
                      echo "La letra $letra no es correcta. Te quedan " . $_SESSION['intentos'] . " intentos.<br>";

                      // Si los intentos llegan a 0, el juego se termina
                      if ($_SESSION['intentos'] == 0) {
                          echo "Has perdido. La palabra era: " . $_SESSION['palabra'] . "<br>";
                          session_destroy();  // Se destruye la sesión para reiniciar el juego
                          echo "<br><a href=''>Reiniciar el juego</a>";
                          exit;
                      }
                  }
              }
          } else {
              echo "Por favor, ingresa solo una letra.<br>";
          }
      }

      // Mostrar las letras usadas hasta ahora
      echo "<br>Letras intentadas: ";
      foreach ($_SESSION['letras'] as $letra_usada) {
          echo $letra_usada . ' ';
      }

      // Mostrar el progreso actual de la palabra
      echo "<br><br>Palabra: ";
      $progreso = '';
      foreach (str_split($_SESSION['palabra']) as $letra) {
          if (in_array(strtolower($letra), $_SESSION['letras'])) {
              $progreso .= $letra . ' ';
          } else {
              $progreso .= '_ ';
          }
      }
      echo $progreso;

      // Verificamos si ya se adivinó toda la palabra
      if (strpos($progreso, '_') === false) {
          echo "<br><br>¡Felicidades, has adivinado la palabra!<br>";
          session_destroy();  // Se destruye la sesión para reiniciar el juego
          echo "<br><a href=''>Reiniciar el juego</a>";
          exit;
      }

      echo "<br><br>Intentos restantes: " . $_SESSION['intentos'];
    ?>
  </div>
</body>
</html>
