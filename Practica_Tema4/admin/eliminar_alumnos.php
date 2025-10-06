<?php
    session_start();
    if(!isset($_SESSION['rol'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Alumno</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>ELIMINAR ALUMNOS</h1>
        <label for="nombre">Nombre Alumno: </label>
        <input type="text" name="nombre">
        <button type="submit">Eliminar Alumno</button>
    </form>
    <?php
        include("../conexion.php");//Incluye la conexion PDO a la base de datos

        if(isset($_POST['nombre'])){//Sacamos los valores del form
            try{
                $nombre=$_POST['nombre'];

                $conexion->beginTransaction();
                $eliminar_alumno="DELETE FROM alumnos WHERE nombre=?";//DELETE que elimina por el nombre de alumno
                $stmt=$conexion->prepare($eliminar_alumno);

                $stmt->execute([$nombre]);
                $conexion->commit();

                echo "<b>Alumno Eliminado<b>";
            }catch(PDOException $e){
                $conexion->rollBack();
                die("Fallo al eliminar en la base de DATOS ".$e->getMessage());
            }
        }
    ?>
    <br><br><a href="../menu.php" class="logout">Volver al menu</a>
</body>
</html>