<html>
    <head>
        <title>Inicio de Sesion</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <form method="post">
            <label for="user">Usuario:</label>
            <input type="text" name="user"><br>
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña"><br>
            <button type="submit">Iniciar Sesion</button>
        </form>

        <a href="registrarse.php">Registrarse</a>

        <?php
            session_start();

            // Inicializar array de usuarios si no existe
            if (!isset($_SESSION['usuarios'])) {
                $_SESSION['usuarios'] = [];
            }

            if(isset($_POST['user'],$_POST['contraseña'])){//Si se sacan los datos del formulario
                $usuario=$_POST['user'];
                $contraseña=$_POST['contraseña'];
                $registrado=false;//Variable para comprobar si el usuario se ha logueado con exito o el usuario al que queremos acceder se ha registrado

                foreach($_SESSION['usuarios'] as $usuarioRegistrado){//Recorremos los usuarios
                    if($usuarioRegistrado['nombre']===$usuario && password_verify($contraseña,$usuarioRegistrado['contraseña'])){//Si el nombre es igual y la contraseña se verifica
                        $_SESSION['nombre']=$usuarioRegistrado['nombre'];//Se crea una variable de nombre de usuario
                        header("Location: menu.php");//Redirigir al menu
                        $registrado=true;
                        exit;
                    }
                }

                if(!$registrado){//Si no existe el usuario nos mostrara el siguiente mensaje
                    echo "<h2><br>El usuario no existe. <br>Registrate para poder acceder a los Podcast!</h2>";
                }
            }
            //var_dump($_SESSION['usuarios']);
        ?>
    </body>
</html>