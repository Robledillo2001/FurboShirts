<?php
    session_start();
    if(!isset($_SESSION['rol'])){
        header("Location: ../login.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Curso</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>CREAR CURSO</h1>
        <label for="nombre">Nombre Curso: </label>
        <input type="text" name="nombre">
        <label for="descripcion">Descripcion: </label>
        <input type="text" name="descripcion">
        <label for="duracion">Duracion </label>
        <input type="number" name="duracion">
        <label for="idprofe">ID del Profesor: </label>
        <input type="number" name="idprofe">
        <button type="submit">Crear Curso</button>
    </form>
    <?php
        include("../conexion.php");//Incluye la conexion PDO a la base de datos

        if(isset($_POST['nombre'],$_POST['descripcion'],$_POST['duracion'],$_POST['idprofe'])){
            try{
                $nombre=$_POST['nombre'];
                $descripcion=$_POST['descripcion'];
                $duracion=$_POST['duracion'];
                $idprofe=$_POST['idprofe'];

                $conexion->beginTransaction();
                $insertar_Curso="INSERT INTO cursos(nombre_curso,descripcion,duracion,id_profesor)VALUES(?,?,?,?)";//Meteremos un curso nuevo con sus valores
                $stmt=$conexion->prepare($insertar_Curso);

                $stmt->execute([
                    $nombre,
                    $descripcion,
                    $duracion,
                    $idprofe
                ]);//Ejecutamos la inserccion con los atributos
                $conexion->commit(); //Guardar cambios
                echo "<h2>Cursos insertado</h2>";
            }catch(PDOException $e){
                $conexion->rollBack();
                die("Fallo al insertar en la base de DATOS ".$e->getMessage());
            }
        }
    ?>
    <br><br><a href="../menu.php" class="logout">Volver al menu</a>
</body>
</html>