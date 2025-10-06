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
    <title>Eliminar Curso</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>Eliminar Cursos</h1>
        <label for="nombre">Nombre Curso: </label>
        <input type="text" name="nombre">
        <button type="submit">Eliminar Curso</button>
    </form>
    <?php
        include("../conexion.php");//Incluye la conexion PDO a la base de datos

        if(isset($_POST['nombre'])){
            try{
                $nombre=$_POST['nombre'];

                $sql="SELECT 1 FROM alumnos AL JOIN cursos C ON C.id_curso=AL.id_curso WHERE C.nombre_curso=? ";//Con esta Select queremos comprobar que el alumno este matriculado en el curso
                $stmt=$conexion->prepare($sql);
                $stmt->execute([$nombre]);

                if($stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "No se puede borrar el curso porque aun hay alumnos matriculados<br>
                    <br><a href='../menu.php'>Volver al menu</a>";
                    exit;
                }

                $conexion->beginTransaction();
                $eliminar_curso="DELETE FROM cursos WHERE nombre_curso=?";//Eliminamos el curso por el nombre del mismo
                $stmt=$conexion->prepare($eliminar_curso);

                $stmt->execute([$nombre]);//Cogemos el atributo del form para que elimine el curso
                $conexion->commit();

                echo "<b>Curso Eliminado</b>";
            }catch(PDOException $e){
                $conexion->rollBack();
                die("Fallo al eliminar en la base de DATOS ".$e->getMessage());
            }
        }
    ?>
    <br><br><a href="../menu.php" class="logout">Volver al menu</a>
</body>
</html>