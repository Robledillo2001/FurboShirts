<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Eliminar</title>
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
    a {
      margin: 10px;
      display: inline-block;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
    a:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
    <?php
    session_start();
        if (!isset($_SESSION['usuario'])) {// Verifica que el usuario esté logueado
            header('Location: login.php');
            exit;
        }
    ?>
    <form method="post">
        <label for="nombreT">Nombre de Tarea</label>
        <input type="text" name="nombreT"><br>
        <button>Eliminar</button>
    </form>
  <div class="resultado">
    <?php
        header("añadir.php");
        /* Header a añadir.php para acceder al array de tareas*/
        if(isset($_POST['nombreT'])){/*Buscamos nombre de la tarea a eliminar */
          $nombreT=(string)$_POST['nombreT'];
          if(isset($_SESSION['tareas'])){
            $eliminar = false; // Variable para verificar si se encontró la tarea
            foreach($_SESSION['tareas'] as $index => $tarea) {
              if($tarea['tarea'] === $nombreT) {
                  unset($_SESSION['tareas'][$index]); // Eliminar la tarea de la sesión
                  echo "La tarea '$nombreT' fue eliminada.";
                  $eliminar = true; // Tarea encontrada
                  break; // Salir del bucle después de eliminar
                }
              }
              if (!$eliminar) {
                echo "La tarea '$nombreT' no se encontró.";/*Si no se encuentra sera false siempre */
              }
          }else{
            echo "No hay tareas en sesion";
          }
        }
        echo"<br>";
    ?>
    <a href="tareas.php">Volver</a>
  </div>
</body>
</html>
