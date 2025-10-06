<?php
require_once "modelo/loginModelo.php";
require_once "modelo/usuarioModelo.php";

class LoginControlador {
    public function comprobarLogin() {
        $login = new Login();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoger datos del formulario
            $usuario = $_POST['usuario'];
            $passwd = $_POST['passwd'];
            $recordar=$_POST['recordar'];

            // Validar si los campos no están vacíos
            if (empty($usuario) || empty($passwd)) {
                echo "No se pueden enviar credenciales Vacias!";
                require_once "vista/login.php";
            }

            // Comprobar el login
            $fila = $login->comprobarLogin($usuario, $passwd);

            if ($fila) {
                session_start();
                $_SESSION['usuario'] = $fila['NOMBRE'];
                $_SESSION['id_usuario']=$fila["ID"];
                $_SESSION['correo']="";
                if($_SESSION['rol']==="usuario"){
                    $_SESSION['correo']=$fila['correo_electronico'];
                }
                // Redirigir al inicio
                header("Location: index.php?action=inicio");
                $login->agregarCookies($_SESSION['rol'],$usuario);//Se añade una cookie con el nombre de usuario y su rol

                if($recordar){
                    setcookie("recordar_user",$usuario,time()+(86400*30),"/");
                }
                exit;
            } else {
                // Redirigir de nuevo al login con error
                echo "Usuario incorrecto:";
                require_once "vista/login.php";
            }
        }

        // Si no es un método POST, simplemente carga la vista del login
        require_once "vista/login.php";
    }

    public function eliminarUsuarios(){
        $login=new Login();
        $user=new Usuario();
        $users=$user->obtenerUsuarios();//Se obtienen a los usuarios de una consulta dentro del metodo de la clase Usuarios
        $admins=$user->obtenerAdmin();//Se obtienen a los admins de una consulta dentro del metodo de la clase Usuarios
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : null;//Si aun no se elige un rol $nombre sera null
            $rol=$_POST['rol'];

            if($nombre){
                $login->eliminarUsuarios($nombre,$rol);
                header("Location: index.php?action=verUsuarios");
            }
        }
        // Si no es un método POST, simplemente carga la vista del login
        require_once 'vista/eliminarUsuarios.php';
    }

    public function agregarUsuarios(){
        $login=new Login();
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $nombre=$_POST['nombre'];
            $contraseña=$_POST['contraseña'];
            $correo=$_POST['correo'];
            $rol=$_POST['rol'];

            if($nombre){
                $login->agregarUsuarios($nombre,$contraseña,$correo,$rol);
                echo "Usuario agregado";
                header("Location: index.php?action=verUsuarios");
            }
        }
        // Si no es un método POST, simplemente carga la vista del login
        require_once 'vista/añadirUsuarios.php';
    }

    public function verUsuarios() {
        $usuario = new Usuario();
    
        $tamaño = 3; // Cantidad de registros por página
        $pagina = isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;
        if ($pagina < 1) $pagina = 1;
        $inicio = ($pagina - 1) * $tamaño;
    
        // Obtener usuarios y administradores en una sola consulta
        $usuarios = $usuario->obtenerUsuariosYAdmins($inicio, $tamaño);
        $totalUsuarios = $usuario->contarUsuariosYAdmins();
        $totalPaginas = ceil($totalUsuarios / $tamaño);
    
        require_once "vista/verUsuarios.php"; // Carga la vista
    }

    public function registrarse(){
        $login=new Login();
        if($_SERVER['REQUEST_METHOD']==="POST"){
            $nombre=$_POST['nombre'];
            $contraseña=$_POST['contraseña'];
            $correo=$_POST['correo'];

            $contraseña_hash=password_hash($contraseña,PASSWORD_DEFAULT);

            if($nombre){
                $login->registrarUsuario($nombre,$contraseña_hash,$correo);
                echo "Te has registrado correctamente";
                header("Location: index.php?action=comprobarLogin");
            }
        }
        require_once "vista/registrarse.php";
    }
    

    public function cambiarContraseña() {
        session_start(); // Debe ejecutarse solo una vez en la aplicación
        $login = new Login();
    
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $contraseña = $_POST['contraseña'];
            $contraseñaNueva = $_POST['nueva'];
            $comprobar = $_POST['comprobar'];
    
            if ($contraseñaNueva === $comprobar && $contraseñaNueva !== $contraseña) {//Si contraseña nueva es igual a la comprobacion y distinto a la contraseña antigua
                //Sacamos los valores de la sesion
                $id_usuario = $_SESSION['id_usuario'];
                $rol = $_SESSION['rol'];
    
                // Llamar a la función de cambio de contraseña
                $resultado = $login->cambiarContraseña($id_usuario, $contraseña, $contraseñaNueva, $rol);
    
                echo $resultado; // Mostrar mensaje al usuario
            } else {
                echo "Las contraseñas no coinciden o es igual a la actual.";
            }
        }
    
        require_once "vista/cambiarContraseña.php"; // Cargar vista después de la lógica
    }
    function cambiarNombre(){
        $login=new Login();
        if($_SERVER['REQUEST_METHOD']==="POST"){//Recogemos los datos del form
            session_start();
            //Sacamos las variables de POST y de la SESSION
            $nombre=$_POST['nombre'];
            $id_usuario=$_SESSION['id_usuario'];
            $rol=$_SESSION['rol'];
            //Llamamos a la funcion
            $resultado=$login->cambiarNombre($id_usuario,$nombre,$rol);

            $login->agregarCookies($rol,$nombre);//Actualizamos las cookies
            echo $resultado;
            if(isset($_COOKIE['recordar_user'])){
                setcookie('recordar_user', $nombre, time() + (86400 * 30), "/");
            }
        }
        require_once "vista/cambiarNombre.php";//Vista con formulario para cambiar nombre
    }
}
?>
