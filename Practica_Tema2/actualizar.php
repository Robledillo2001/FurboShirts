<?php
declare(strict_types=1);
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Actualizar Tareas</title>
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
      // Verifica que el usuario esté logueado
      if (!isset($_SESSION['usuario'])) {
          header('Location: login.php');
          exit;
      }
  ?>
  
  <h1>Actualizar Tareas</h1>
  
  <form method="POST">
    <label for="id">Tarea:</label>
    <input type="text" id="tarea" name="tarea" required><br>
    <label for="emp">Empleado:</label>
    <input type="text" id="emp" name="emp" required><br>
    <input type="radio" id="pendiente" name="estado" value="Pendiente" required>
    <label for="pendiente">Pendiente</label>
    <input type="radio" id="completado" name="estado" value="Completado" required>
    <label for="completado">Completado</label><br>
    <button type="submit">Actualizar tarea</button>
  </form>
  
  <div class="resultado">
    <?php
        header("añadir.php");/* Header a añadir.php para acceder al array de tareas*/
        // Manejo de actualización de tareas
        if (isset($_POST['tarea'], $_POST['emp'], $_POST['estado'])) {
            $nombreT = (string)$_POST['tarea'];
            $empleado = (string)$_POST['emp'];
            $estado = (string)$_POST['estado'];

            // Comprobar si la tarea existe
            if (isset($_SESSION['tareas'])) {
                foreach ($_SESSION['tareas'] as &$tarea) {  // Pasar $tarea por referencia
                    if ($tarea['tarea'] == $nombreT && $tarea['empleado'] == $empleado) {/*Comprobar que el nombre de la tarea y empleado sea el mismo que se paso por el form */
                        $tarea['estado'] = $estado;/*El estado se cambia */
                        echo "Tarea " . $tarea['tarea'] . " encargada a $empleado cambió a $estado";
                        break;//Rompemos el bucle una vez se compruebe la condicion
                    }
                }
            } else {
                echo "<Error: Tarea no encontrada.";
            }
            
        }
    ?>
    <br>
    <a href="tareas.php">Volver</a>
  </div>
</body>
</html>
