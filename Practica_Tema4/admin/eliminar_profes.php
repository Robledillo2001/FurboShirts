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
    <title>Eliminar Profesores</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>ELIMINAR PROFESORES</h1>
        <label for="nombre">Nombre Profesor: </label>
        <input type="text" name="nombre">
        <label for="apel">Apelldos profesor: </label>
        <input type="text" name="apel">
        <button type="submit">Eliminar Profesor</button>
    </form>
    <?php
        include("../conexion.php");//Incluye la conexion PDO a la base de datos

        if(isset($_POST['nombre'],$_POST['apel'])){//Sacamos los valores del form
            try{
                $nombre=$_POST['nombre'];
                $apel=$_POST['apel'];

                $conexion->beginTransaction();
                $eliminar_profe="DELETE FROM profesores WHERE NOMBRE=? AND apellidos=?";//DELETE de la tabal profesores
                $stmt=$conexion->prepare($eliminar_profe);

                $stmt->execute([$nombre,$apel]);//Se ejecutara porque se eliminara el profe con el nombre y apellidos del form si lo encuentra
                $conexion->commit();

                echo "<b>Profesor Eliminado<b>";
            }catch(PDOException $e){
                $conexion->rollBack();
                die("Fallo al eliminar en la base de DATOS ".$e->getMessage());
            }
        }
    ?>
    <br><br><a href="../menu.php" class="logout">Volver al menu</a>
</body>
</html>