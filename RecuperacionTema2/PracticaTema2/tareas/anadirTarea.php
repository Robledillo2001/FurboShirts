<?php
    session_start();// Iniciamos la sesión

    if(!isset($_SESSION['tareas'])){
        $_SESSION['tareas'] = [];// Si no existe el array de tareas, se crea
    }

    if (!isset($_SESSION['usuario'])) {
        header('Location: ../login.php');/*Verifica que el usuario este logueado */
        exit;
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
    <title>Añadir Tarea</title>
</head>
<body>
    <form method="post">
        <label for="titulo">Tarea:</label>
        <input type="text" name="titulo"><br>
        <label for="desc">Descripcion:</label>
        <input type="text" name="desc"><br>
        <label for="emp">Nombre Empleado:</label>
        <input type="text" name="emp"><br>
        <label for="">Estado:</label>
        <select name="estado">
            <option value="completada">Completada:</option>
            <option value="pendiente">Pendiente:</option>
        </select>
        <input type="submit" value="Añadir Tarea">
    </form>
    <?php
        if(isset($_POST['titulo'],$_POST['desc'],$_POST['emp'],$_POST['estado'])){
            $_SESSION['tareas'][]=[//Si coge los datos de la tarea los almacena en el array de sesion
                "titulo"=>$_POST['titulo'],
                "desc"=>$_POST['desc'],
                "emp"=>$_POST['emp'],
                "estado"=>$_POST['estado']
            ];

            echo "<p>Tarea asignada</p>";
        }
    ?><br>
    <a href="../index.php">Volver</a>
</body>
</html>