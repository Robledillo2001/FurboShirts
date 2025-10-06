<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Añadir</title>
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
  <h1>Añadir Tareas</h1>
  <form method="POST">
    <label for="tarea">Tarea:</label>
    <input type="text" id="tarea" name="tarea"><br>
    <label for="desc">Descripcion:</label>
    <input type="text" id="desc" name="desc"><br>
    <label for="emp">Empleado:</label>
    <input type="text" id="emp" name="emp"><br>
    <input type="radio" id="pendiente" name="estado" value="Pendiente">
    <label for="php">Pendiente</label>
    <input type="radio" id="completado" name="estado" value="Completado">
    <label for="php">Completado</label><br>
    <button type="submit">Agregar tarea</button>
  </form>
  <div class="resultado">
    <?php

        if(isset($_POST['tarea'],$_POST['desc'],$_POST['emp'],$_POST['estado'])){/*Sacamos todos los datos del formulario para añadir tareas */
            $tarea=(string)$_POST['tarea'];/*Nombre de la tarea */
            $descripcion=(string)$_POST['desc'];/*Descripcion de la tarea*/
            $empleado=(string)$_POST['emp'];/*Nombre del empleado */
            $estado=(string)$_POST['estado'];/*Estado de la tarea */

            if(!isset($_SESSION['tareas'])){
                $_SESSION['tareas']=[];
            }/*Se comprueba de que se haya iniciado sesion antes */

            $_SESSION['tareas'][]=["tarea"=>$tarea,"descripcion"=>$descripcion,"empleado"=>$empleado,"estado"=>$estado];/*Creamos el array de tareas */

            echo "Tarea añadida--->$tarea<br>Estado $estado<br>Descripcion: $descripcion<br>Empleado: $empleado<br>";
        }
        
    ?>
    <a href="tareas.php">Volver</a>
  </div>
</body>
</html>
