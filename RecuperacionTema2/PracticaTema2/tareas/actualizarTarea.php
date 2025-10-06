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
    <title>Act Tarea</title>
</head>
<body>
    <form method="post">
        <label for="titulo">Tarea:</label>
        <input type="text" name="titulo"><br>
        <label for="">Estado:</label>
        <select name="estado">
            <option value="completada">Completada:</option>
            <option value="pendiente">Pendiente:</option>
        </select>
        <input type="submit" value="Act Tarea">
    </form>
    <?php
        if(isset($_POST['titulo'],$_POST['estado'])){
            $titulo=$_POST['titulo'];
            $estado=$_POST['estado'];
            $econtrada=false;
            foreach($_SESSION['tareas']as &$tarea){//Si coge los datos del formulario recorrera el array
                if($tarea['titulo']===$titulo){//Si encuentra el titulo de la tarea
                    $tarea['estado']=$estado;//Cambiara el estado de la misma
                    echo "Tarea ACTUALIZADA!!";
                    $econtrada=true;//Si se encuentra la tarea se pondra $encontrada true
                    break;
                }
            }
            if(!$econtrada){
                echo "No se encontro el nombre de la tarea";//Si no se pondra el mensaje de que no se encontro
            }
        }
    ?><br>
    <a href="../index.php">Volver</a>
</body>
</html>