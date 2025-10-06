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
    <title>Inscribir Profesor</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>INSERTAR PROFESORES</h1>
        <label for="nombre">Nombre Profesor: </label>
        <input type="text" name="nombre">
        <label for="apel">Apelldos profesor: </label>
        <input type="text" name="apel">
        <label for="user">Nombre Usuario: </label>
        <input type="text" name="user">
        <label for="passwd">Contraseña: </label>
        <input type="password" name="passwd">
        <button type="submit">Insertat Profesor</button>
    </form>
    <?php
        include("../conexion.php");//Incluye la conexion PDO a la base de datos

        if(isset($_POST['nombre'],$_POST['apel'],$_POST['user'],$_POST['passwd'])){//Sacamos los valores del form
            try{
                $nombre=$_POST['nombre'];
                $apel=$_POST['apel'];
                $user=$_POST['user'];
                $passwd=$_POST['passwd'];

                $conexion->beginTransaction();//Empezamos transaccion SQL
                $insertar_profe="INSERT INTO profesores(nombre,apellidos,user,password)VALUES(?,?,?,?)";//insert de la tabla profesores
                $stmt=$conexion->prepare($insertar_profe);

                $stmt->execute([$nombre,$apel,$user,$passwd]);//Valores que insertamos a la tabla profesores
                $conexion->commit();

                echo "<b>Profesor Insertado<b>";
            }catch(PDOException $e){
                $conexion->rollBack();
                die("Fallo al insertar en la base de DATOS ".$e->getMessage());
            }
        }
    ?>
    <br><br><a href="../menu.php" class="logout">Volver al menu</a>
</body>
</html>