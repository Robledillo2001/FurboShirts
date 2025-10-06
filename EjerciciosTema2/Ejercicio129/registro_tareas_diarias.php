<?php
declare(strict_types=1);
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Lista de la compra</title>
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
  <h1>Lista de la compra</h1>
  <form method="POST">
    <label for="tarea">Descripción de la Tarea:</label>
    <input type="text" id="tarea" name="tarea"><br>

    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha"><br>

    <label for="hora">Hora:</label>
    <input type="time" id="hora" name="hora" ><br>

    <button type="submit">Agregar Tarea</button>
  </form>
  
  <div class="resultado">
    <?php
      if(isset($_POST['tarea'],$_POST['fecha'],$_POST['hora'])){
        $tarea=$_POST['tarea'];
        $fecha=$_POST['fecha'];
        $hora=$_POST['hora'];
        
        if(!isset($_SESSION['tareas'])){
          $_SESSION['tareas']=[];
        }

        if(count($_SESSION['tareas'])<5){
          $_SESSION['tareas'][]=[
            'tarea'=>$tarea,
            'fecha'=>$fecha,
            'hora'=>$hora
          ];
        }

        if(!empty($_SESSION['tareas'])){
          foreach($_SESSION['tareas']as $lista){
            echo $lista['tarea']."--->Fecha: ".$lista['fecha']."---> Hora: ".$lista['hora']."<br>";
          }
        }else{
          echo "Aun no hay tareas agregadas";
        }
      }
    ?>
  </div>
</body>
</html>
