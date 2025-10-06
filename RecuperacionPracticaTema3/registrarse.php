<html>
    <head>
        <title>Registrar Usuario</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <form method="post">
            <label for="user">Usuario:</label>
            <input type="text" name="user"><br>
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña"><br>
            <button type="submit">Registrar Usuario</button>
        </form>
        <b>¿Ya tienes un usuario registrado?<p style="text-align: center; font-size:20px;">⬇️</p><a href="login.php">Iniciar Sesion</b></a>
        <?php
            session_start();
            if(!isset($_SESSION['usuarios'])){//Si no hay usuarios crea un array de sesion
                $_SESSION['usuarios']=[];
            }
            if(isset($_POST['user'],$_POST['contraseña'])){
                $usuario=$_POST['user'];
                $contraseña=$_POST['contraseña'];
                $encontrado=false;

                $contraseñaHasheada=password_hash($contraseña,PASSWORD_DEFAULT);//hashear contraseña

                foreach($_SESSION['usuarios']as $usuarioRegistrado){//SI el usuario ya esta en el array se mostrara un mensaje despues
                    if($usuarioRegistrado['nombre']===$usuario){
                        $encontrado=true;
                        break;
                    }
                }

                if($encontrado){
                    echo "El usuario ya fue registrado";
                }else{//Si no encunetra el nombre de user añade el usuario al array
                    $_SESSION['usuarios'][]=[
                        "nombre"=>$usuario,
                        "contraseña"=>$contraseñaHasheada
                    ];
                    header('Location: login.php');//Redirige a login
                    exit;
                }
                
                
            }
        ?>
    </body>
</html>