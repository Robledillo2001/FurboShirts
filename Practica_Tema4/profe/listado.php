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
    <title>Alumnos y Cursos</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>Listado de Alumnos, Cursos y Profesores</h1>
        <label for="">Elige una opcion: </label>
        <select name="opciones">
            <?php
                if(!isset($_POST['opciones'])){
                    $_POST['opciones']="";
                }
            ?>
            <option value="alumnos"<?php if($_POST['opciones']=="alumnos"){echo"selected";}?>>Alumnos</option>
            <option value="cursos"<?php if($_POST['opciones']=="cursos"){echo"selected";}?>>Cursos</option>
        </select>
        <button type="submit">Listar!</button>
    </form>
    <?php
        include("../conexion.php");//Incluye la conexion PDO a la base de datos

        if(isset($_POST['opciones'])){
            try{
                $opcion=$_POST['opciones'];

                if($opcion==="alumnos"){
                    $alumnos = "SELECT alumnos.id_alumno, alumnos.nombre, alumnos.email, cursos.nombre_curso, calificaciones.nota 
                                FROM alumnos 
                                JOIN calificaciones ON alumnos.id_alumno = calificaciones.id_alumno
                                JOIN cursos ON calificaciones.id_curso = cursos.id_curso";
                                /*Se hara una consulta de las tablas alumnos calificaciones y cursos ya que
                                  los alumnos comparten el id de alumno con las calificaciones y estos comparten el id del curso con el curso
                                */
                    $stmt=$conexion->prepare($alumnos);

                    $stmt->execute();
                    echo"<table border='1'>
                            <tr>
                                <th colspan='5'>Datos de los Alumnos</th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>EMAIL</th>
                                <th>CURSO</th>
                                <th>NOTA</th>
                            </tr>";
                    while($fila=$stmt->fetch()){
                        echo"<tr>
                                <td>".$fila['id_alumno']."</td>
                                <td>".$fila['nombre']."</td>
                                <td>".$fila['email']."</td>
                                <td>".$fila['nombre_curso']."</td>
                                <td>".$fila['nota']."</td>
                            </tr>";
                    }
                    echo"</table>";
                }elseif($opcion==="cursos"){
                    $cursos="SELECT cursos.id_curso, cursos.nombre_curso, cursos.descripcion, profesores.nombre 
                            FROM cursos JOIN profesores
                            ON cursos.id_profesor=profesores.id_profesor";
                             /*Se hara una consulta de las tablas profesores y cursos ya que
                                        los profesores comparten el id de profesor el curso
                            */
                    $stmt=$conexion->prepare($cursos);

                    $stmt->execute();
                    echo"<table border='1'>
                            <tr>
                                <th colspan='5'>Datos de los Cursos</th>
                            </tr>
                            <tr>
                                <th>ID CURSO</th>
                                <th>CURSO</th>
                                <th>DESCRIPCION</th>
                                <th>PROFESOR</th>
                            </tr>";
                    while($fila=$stmt->fetch()){
                        echo"<tr>
                                <td>".$fila['id_curso']."</td>
                                <td>".$fila['nombre_curso']."</td>
                                <td>".$fila['descripcion']."</td>
                                <td>".$fila['nombre']."</td>
                            </tr>";
                    }
                    echo"</table>";
                }
            }catch(PDOException $e){
                die("Fallo al asignar profesor en la base de DATOS ".$e->getMessage());
            }
        }
    ?>
    <br><br><a href="../menu.php" class="logout">Volver al menu</a>
</body>
</html>