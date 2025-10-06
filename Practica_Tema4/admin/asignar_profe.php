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
    <title>Asignar profe</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>ASIGNAR PROFESOR A UN CURSO</h1>
        <label for="id_profe">ID Profesor: </label>
        <input type="number" name="id_profe">
        <label for="id_curso">ID Curso: </label>
        <input type="number" name="id_curso">
        <button type="submit">Asignar Profe</button>
    </form>
    <?php
        include("../conexion.php");//Incluye la conexion PDO a la base de datos

        if(isset($_POST['id_profe'],$_POST['id_curso'])){
            try{
                $id_profe=$_POST['id_profe'];
                $id_curso=$_POST['id_curso'];

                $conexion->beginTransaction();
                $asignar_profe="UPDATE cursos SET id_profesor=? WHERE id_curso=?";//UPDATE de la tabla cursos porque le cambiamos el id de profesor si encuentra el id de curso solicitado
                $stmt=$conexion->prepare($asignar_profe);

                $stmt->execute([$id_profe,$id_curso]);//Ejecutamos consulta
                $conexion->commit();

                echo "<b>Profesor Asignado<b>";
            }catch(PDOException $e){
                $conexion->rollBack();
                die("Fallo al asignar profesor en la base de DATOS ".$e->getMessage());
            }
        }
    ?>
    <br><br><a href="../menu.php" class="logout">Volver al menu</a>
</body>
</html>