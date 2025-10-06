<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Academia</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
        session_start();//Iniciamos sesion siempre porque guardaremos al menos un valor de sesion del rol del usuario
        include("conexion.php");

        //Sesiones por defecto de usuario y contraseña

        if (isset($_POST['usuario'], $_POST['contrasena'])) {
            // Sanitización de entradas
            $user = $_POST['usuario'];
            $passwd = $_POST['contrasena'];
            if(empty($user)&&empty($passwd)){
                $user=$_SESSION['user'];
                $passwd=$_SESSION['passwd'];
            }

            try {
                // Consultas SQL
                $administrativo = "SELECT * FROM administrativos WHERE user=? AND password=?";
                $profesor = "SELECT * FROM profesores WHERE user=? AND password=?";

                // Verificación en tabla de administrativos
                $stmt_admin = $conexion->prepare($administrativo);
                $stmt_admin->execute([$user, $passwd]);

                // Verificación en tabla de profesores
                $stmt_profe = $conexion->prepare($profesor);
                $stmt_profe->execute([$user, $passwd]);

                // Asignación de roles
                if ($stmt_admin->rowCount() > 0) {//Si el usuario y contraseña esta en la tabla administrativo el rol sera administrativo
                    $_SESSION['rol'] = "administrativo";//Se creara un una sesion tipo rol para que al recargar la pagina no se pierda el menu
                    while($fila=$stmt_admin->fetch()){//Sacamos los valores del ID, usuario y contraseña del profesor
                        $_SESSION['user']=$fila['user'];
                        $_SESSION['passwd']=$fila['password'];
                    }
                } elseif ($stmt_profe->rowCount() > 0) {//Si el usuario y contraseña esta en la tabla profesores el rol sera profesor ademas de crear usuario y contraseña de sesion
                    $_SESSION['rol'] = "profesor";
                    while($fila=$stmt_profe->fetch()){//Sacamos los valores del ID, usuario y contraseña del profesor
                        $_SESSION['id']=$fila['id_profesor'];
                        $_SESSION['user']=$fila['user'];
                        $_SESSION['passwd']=$fila['password'];
                    }
                } else {
                    echo "<h2>Usuario o contraseña incorrectos</h2>";
                    echo "<a href='logout.php'>Volver al Login</a>";
                    exit();
                }
            } catch (PDOException $e) {
                echo "<h2>Error: No se pudo conectar a la base de datos.</h2>";
                die("Detalles del error: " . $e->getMessage());
            }
        }
        if(isset($_SESSION['rol'],$_SESSION['user'])){
            // Mostrar opciones según el rol
            if ($_SESSION['rol'] === "administrativo") {//Rol administrativo menu administrativo
                echo "<h2>Oficina Administracion<br>
                            Bienvenido ".$_SESSION['user']."</h2>
                    
                    <ul>
                        <li><a href='admin/inscribir_alumno.php'>Inscribir Alumno</a></li>
                        <li><a href='admin/eliminar_alumnos.php'>Eliminar alumnos</a></li>
                        <li><a href='admin/inscribir_profesor.php'>Inscribir Profesor</a></li>
                        <li><a href='admin/eliminar_profes.php'>Eliminar Profesores</a></li>
                        <li><a href='admin/asignar_profe.php'>Asignar Profesor a un Curso</a></li>
                        <li><a href='admin/listado.php'>Ver Alumnos, Profesores o Cursos</a></li>
                    </ul>";
            } elseif ($_SESSION['rol'] === "profesor") {//Rol profesor menu profesor
                echo "<h2>Oficina de Profesor<br>
                            Bienvenido ".$_SESSION['user']."</h2>
                    <ul>
                        <li><a href='profe/listado.php'>Ver Alumnos o Cursos</a></li>
                        <li><a href='profe/crear_curso.php'>Crear nuevo curso</a></li>
                        <li><a href='profe/asignar_alumno.php'>Asignar alumno a un curso</a></li>
                        <li><a href='profe/eliminar_curso.php'>Eliminar curso</a></li>
                        <li><a href='profe/calificar_alumnos.php'>Calificar Alumnos</a></li>
                        <li><a href='profe/modificar_perfil.php'>Modificar perfil</a></li>
                    </ul>";
            }
            echo "<a href='logout.php' class='logout'>Cerrar Sesion</a>";//Enlace para loguearse con otro usuario
        }else{
            header("Location: login.php");//Si no hay rol se vuelve al login
        }
    ?>
</body>
</html>
