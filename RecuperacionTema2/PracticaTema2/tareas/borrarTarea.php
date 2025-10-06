<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header("Location: ../login.php");
    }

    if(!isset($_SESSION['tareas'])){
        $_SESSION['tareas']=[];
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
    <title>Borrar Tarea</title>
</head>
<body>
    <form method="post">
        <label for="titulo">Tarea:</label>
        <input type="text" name="titulo"><br>
        <input type="submit" value="Borrar Tarea">
    </form>
    <?php
        if(isset($_POST['titulo'])){
            $titulo=$_POST['titulo'];
            $econtrada=false;//valor bool por si encuentra el titulo de tarea
            foreach($_SESSION['tareas'] as $index => $tarea){//Recorre el array de tareas para encontrar el titulo y su posicion
                if($tarea['titulo']===$titulo){//Si encuentra el titulo
                    unset($_SESSION['tareas'][$index]);//Elimina el indice
                    echo "Tarea eliminada";
                    $econtrada=true;//$Encontrada se pondra true si encuentra el titulo de tarea y rompera el bucle
                    break;
                }
            }
            if(!$econtrada){
                echo "No se encontro el nombre de la tarea";//Si no mostrara que no se encontro
            }
        }
    ?><br>
    <a href="../index.php">Volver</a>
</body>
</html>