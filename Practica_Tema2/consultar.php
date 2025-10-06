<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Consultar</title>
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
      text-align: center;
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
        if (!isset($_SESSION['usuario'])) {
            header('Location: login.php');/*Verifica que el usuario este logueado */
            exit;
        }
    ?>
    <h1>Consultar por empleado</h1>
    <form method="post">
        <label for="emp">Nombre de Empleado</label>
        <input type="text" name="emp"><br>
        <button type="submit">Consultar Empleado</button>
    </form>
    <h1>Consultar por estado de Tarea</h1>
    <form method="post">
    <label>Estado de tarea</label>
        <input type="radio" id="pendiente" name="estado" value="Pendiente">
        <label for="estado">Pendiente</label>
        <input type="radio" id="completado" name="estado" value="Completado">
        <label for="estado">Completado</label><br>
        <button type="submit">Consultar Estado</button>
    </form>
    
  <div class="resultado">
  <table border="1">
      <tr>
          <th>Nombre tarea</th>
          <th>Descripcion</th>
          <th>Opcion</th>
      </tr>
    <?php
        header("añadir.php");/* Header a añadir.php para acceder al array de tareas*/
        
        if(isset($_POST['estado'])){
          $estado=$_POST['estado'];
          echo"<tr>";
          echo"<td colspan='2'>Tareas segun 'estado' ".$estado."</td>";
          echo "<th>Nombre empleado</th>";
          echo"</tr>";
          if(isset($_SESSION['tareas'])){
            foreach($_SESSION['tareas']as $tareas=>$tarea){
              echo "<tr>";
              if($tarea['estado']==$estado){
                echo "<td>".$tarea['tarea']."</td>";
                echo "<td>".$tarea['descripcion']."</td>";
                echo "<td>".$tarea['empleado']."</td>";
              }
              echo "</tr>";
            }
          }else{
            echo"<tfoot colspan='3'>No hay tareas</tfoot>";
          }
        }

       if(isset($_POST['emp'])){
        $empleado=$_POST['emp'];
        echo"<tr>";
        echo"<td colspan='2'>Tareas segun 'el empleado' ".$empleado."</td>";
        echo "<th>Estado tarea</th>";
        echo"</tr>";
        if(isset($_SESSION['tareas'])){
          foreach($_SESSION['tareas']as $tareas=>$tarea){
            echo "<tr>";
            if($tarea['empleado']==$empleado){
              echo "<td>".$tarea['tarea']."</td>";
              echo "<td>".$tarea['descripcion']."</td>";
              echo "<td>".$tarea['estado']."</td>";
            }
            echo "<tr>";
          }
        }else{
          echo"<tfoot colspan='2'>No hay tareas</tfoot>";
        }
       }
    ?>
    </table>
    <a href="tareas.php">Volver</a>
  </div>
</body>
</html>
