<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header("Location: ../login.php");
    }

    if(!isset($_SESSION['tareas'])){
        $_SESSION['tareas'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descripción breve de tu página">
    <meta name="author" content="Tu Nombre">
    <meta name="keywords" content="HTML, plantilla, ejemplo">
    <title>Mostrar Tarea</title>
</head>
<body>
    <table border=1>
        <tr>
            <th>Tarea</th>
            <th>Descripcion</th>
            <th>Empleado</th>
            <th>ESTADO</th>
        </tr>
    <?php
      foreach($_SESSION['tareas']as $tarea){//Recorremos el array
        echo "
            <tr>
                <td>".$tarea['titulo']."</td>
                <td>".$tarea['desc']."</td>
                <td>".$tarea['emp']."</td>
                <td>".$tarea['estado']."</td>
            </tr>";//Para mostrar los valores de las tareas
      }  
    ?><br>
    </table>
    <a href="../index.php">Volver</a>
</body>
</html>