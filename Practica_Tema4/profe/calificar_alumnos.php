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
    <title>Calificar Alumnos</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>Calificar Alumnos</h1>
        <label for="alum">id_alumno </label>
        <input type="number" name="alum">
        <label for="curso">id_curso </label>
        <input type="number" name="curso">
        <label for="nota">nota </label>
        <input type="text" name="nota">
        <button type="submit">Calificar Alumnos</button>
    </form>
    <?php
        include("../conexion.php");//Incluye la conexion PDO a la base de datos

        if(isset($_POST['alum'],$_POST['curso'],$_POST['nota'])){
            try{
                $id_Alumno=$_POST['alum'];
                $id_Curso=$_POST['curso'];
                $nota=$_POST['nota'];
                $fechacal=date("Y-m-d");

                $sql="SELECT * FROM calificaciones C INNER JOIN alumnos A ON C.id_alumno=A.id_alumno WHERE C.id_alumno=? AND C.id_curso=?";//Hacemos una Select
                                                                                                                                //Con las tablas de alumno y calificaciones
                                                                                                                                //para saber si el alumno tiene calificacion
                $stmt=$conexion->prepare($sql);
                $stmt->execute([$id_Alumno,$id_Curso]);

                $conexion->beginTransaction();

                if(!$stmt->fetch(PDO::FETCH_ASSOC)){//Si el id del alumno no esta en la tabla calificaciones se insertara una nueva
                    $insertar_calificacion="INSERT INTO calificaciones(id_alumno,id_curso,nota,fecha_calificacion)VALUES(?,?,?,?)";
                    $stmt=$conexion->prepare($insertar_calificacion);
                    
                    $stmt->execute([
                        $id_Alumno,
                        $id_Curso,
                        $nota,
                        $fechacal
                    ]);
                    $conexion->commit();
                    echo "<B>Calificacion Insertada</B>";
                }else{//En cambio si ya esta en la tbla solo queremos cambiarle la fecha a la de hoy y la nota siempre que este el di del curso y alumno que le hemos pasado
                    $calificar="UPDATE calificaciones SET nota=?, fecha_calificacion=? WHERE id_alumno=? AND id_curso=?";//Actualizamos las calificaciones con la nota del form y la fecha de hoy 
                                                                                                                    //si encontramos los id del alumno y curso respectivamente
                    $stmt=$conexion->prepare($calificar);

                    $stmt->execute([
                        $nota,
                        $fechacal,
                        $id_Alumno,
                        $id_Curso
                    ]);//Ejecutamos el UPDATE
                    $conexion->commit();//Guardamos cambios
                    echo "<b>Cambio en la Calificacion</b>";
                    }
            }catch(PDOException $e){
                $conexion->rollBack();//Se borran los cambios si hay un error
                die("Fallo al calificar en la base de DATOS ".$e->getMessage());
            }
        }
    ?>
    <br><br><a href="../menu.php" class="logout">Volver al menu</a>
</body>
</html>