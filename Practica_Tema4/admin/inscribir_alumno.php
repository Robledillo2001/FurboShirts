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
    <title>Inscribir ALumno</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>INSERTAR ALUMNOS</h1>
        <label for="nombre">Nombre Alumno: </label>
        <input type="text" name="nombre">
        <label for="email">Correo Alumno: </label>
        <input type="text" name="email">
        <label for="fechanac">Fecha de Nacimiento: </label>
        <input type="text" name="fechanac">
        <label for="idcurso">ID del Curso: </label>
        <input type="text" name="id_curso">
        <button type="submit">Añadir Alumno</button>
    </form>
    <?php
        include("../conexion.php");//Incluye la conexion PDO a la base de datos

        if(isset($_POST['nombre'],$_POST['email'],$_POST['fechanac'],$_POST['id_curso'])){//Sacamos los valores del form
            try{
                $nombre=$_POST['nombre'];
                $email=$_POST['email'];
                $fechanac=$_POST['fechanac'];
                $id_curso=$_POST['id_curso'];

                $conexion->beginTransaction();//Comenzamos la transccion SQL
                $insertar_Alumno="INSERT INTO alumnos(nombre,email,fecha_nacimiento,id_curso)VALUES(?,?,?,?)";//insert con valores y prepararamos un statement con la consulta
                $stmt=$conexion->prepare($insertar_Alumno);

                $stmt->execute([
                    $nombre,
                    $email,
                    $fechanac,
                    $id_curso
                ]);//Ponemos los valores que le queremos insertar dentro de un arrya
                $conexion->commit(); //Hacemos que los cambios no se puedan borrar
                echo "Alumno insertado";
            }catch(PDOException $e){
                $conexion->rollBack();//Si hay algun fallo hace rollback para que no afecte a la tabla
                die("Fallo al insertar en la base de DATOS ".$e->getMessage());
            }
        }
    ?>
    <br><br><a href="../menu.php" class="logout">Volver al menu</a>
</body>
</html>