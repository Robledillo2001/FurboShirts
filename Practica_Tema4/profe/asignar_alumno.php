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
    <title>Asignar Alumno</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>ASIGNAR ALUMNO A UN CURSO</h1>
        <label for="id_alum">ID Alumno: </label>
        <input type="number" name="id_alum">
        <label for="id_curso">ID Curso: </label>
        <input type="number" name="id_curso">
        <button type="submit">Asignar Alumno</button>
    </form>
    <?php
        include("../conexion.php");//Incluye la conexion PDO a la base de datos

        if(isset($_POST['id_alum'],$_POST['id_curso'])){
            try{
                $id_alum=$_POST['id_alum'];
                $id_curso=$_POST['id_curso'];

                $conexion->beginTransaction();
                $asignar_profe="UPDATE alumnos SET id_curso=? WHERE id_alumno=?";//UPDATE donde le cambiamos el id del curso si encuntra el id del alumno
                $stmt=$conexion->prepare($asignar_profe);

                $stmt->execute([$id_curso,$id_alum]);//Ejecutamos consulta
                $conexion->commit();

                echo "<b>Alumno Asignado</b>";
            }catch(PDOException $e){
                $conexion->rollBack();
                die("Fallo al asignar alumno en la base de DATOS ".$e->getMessage());
            }
        }
    ?>
    <br><br><a href="../menu.php" class="logout">Volver al menu</a>
</body>
</html>