<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Mostrar</title>
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
        // Verifica que el usuario esté logueado
        if (!isset($_SESSION['usuario'])) {
            header('Location: login.php');
            exit;
        }
    ?>
    <h1>Todas las tareas con sus respectivos empleados,descripcion y estado</h1>
  <div class="resultado">
    <table border="1">
      <tr>
        <th>Tarea</th>
        <th>Descripcion</th>
        <th>Empleado</th>
        <th>Estado</th>
      </tr>
    <?php
        header("añadir.php");/* Header a añadir.php para acceder al array de tareas*/
        
        if(isset($_SESSION['tareas'])){
            foreach($_SESSION['tareas']as $tareas=>$tarea){//Mostrar array de tareas
              echo"<tr>";//Crear fila
                foreach($tarea as $clave=>$valor){
                    echo "<td>$valor</td>";//Imprime fila
                }
                echo"<br></tr>";//Cierra fila
            }
        }else{
          echo "<tr><td colspan='4'>No hay tareas por gestionar</td></tr>";
        }
    ?>
    </table>
    <a href="tareas.php">Volver</a>
  </div>
</body>
</html>
