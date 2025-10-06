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
    <title>Modificar Peril</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>Modificar perfil</h1>
        <label for="nombre">Nombre Profesor </label>
        <input type="text" name="nombre" required>
        <label for="apel">Apellidos profesor </label>
        <input type="text" name="apel" required>
        <label for="user">Nombre Usuario </label>
        <input type="text" name="user" required>
        <label for="passwd">Contraseña </label>
        <input type="text" name="passwd" required>
        <button type="submit">Modificar perfil</button>
    </form>
    <?php
        include("../conexion.php");//Incluye la conexion PDO a la base de datos

        if(isset($_POST['nombre'],$_POST['apel'],$_POST['user'],$_POST['passwd'])){
            try{
                $nombre=$_POST['nombre'];
                $apel=$_POST['apel'];
                $user=$_POST['user'];
                $passwd=$_POST['passwd'];

                $conexion->beginTransaction();
                $modificar_perfil="UPDATE profesores SET nombre=?, apellidos=?, user=?, password=? WHERE id_profesor=?";//Modificamos el perfil del profesor con todos los atributos.
                                                                                                                        //Siempre que encuentre el ID de sesion
                $stmt=$conexion->prepare($modificar_perfil);

                $stmt->execute([
                    $nombre,
                    $apel,
                    $user,
                    $passwd,
                    $_SESSION['id']
                ]);
                $conexion->commit();

                echo "<b>Cambio en el usuario</b>";

                $_SESSION['user']=$user;//Cambiara el nombre de usuario de sesion
                $_SESSION['passwd']=$passwd;//Cambiara la contraseña de usuario de sesion
            }catch(PDOException $e){
                $conexion->rollBack();
                die("Fallo al modificar perfil en la base de DATOS ".$e->getMessage());
            }
        }
    ?>
    <br><br><a href="../menu.php" class="logout">Volver al menu</a>
</body>
</html>