<?php
    require_once "modelo/usuario_modelo.php";
    //Excepciones del PHPMAILER
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Incluir las clases de PHPMailer
    require_once "./config.php";
    rutasMail();//Metodo de config.php para agregar las clases de PHPMailer
    class usuarios_controlador{
        private function checkAdmin(){//Metodo privado que se usaran en los metodos que use el admin para que el Cliente y el Visitante no puedan acceder
            if(!isset($_SESSION['ROL']) || $_SESSION['ROL'] !== "admin"){
                header("Location: index.php?action=inicio");//Y redirija al Inicio directamente
                exit();//Finaliza la ejecucion del script para que ocurra la redireccion
            }
        }

        public function configuracion(){
            require_once "vista/configuracion.php";
        }

        public function GestionAdmin(){//Metodo para ver a todos los admins
            $this->checkAdmin();

            $modelo=new Usuarios();

            //Configuracion de la paginacion
            $users=5;
            $paginaActual=isset($_GET['pagina'])? (int)$_GET['pagina']:1;
            if($paginaActual<1)$paginaActual=1;

            $inicio=($paginaActual-1)*$users;

            //Obtener los datos del modelo
            $totalAdmins=$modelo->contarAdmins();
            $totalPaginas=ceil($totalAdmins/$users);

            //Obtenemos todos los Administradores de la pagina
            $admins=$modelo->mostrarAdministradores($inicio,$users);

            //Cargar la vista con los admis
            require_once "vista/usuarios/GestionAdmin.php";
        }

        public function anadirAdmin(){//Metodo para añadir administradores
            $this->checkAdmin();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){//Recogida de datos del formulario
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $correo = $_POST['correo'];
                $passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT); 
                $nombreUser = $_POST['nombreUser'];

                //Llamada al metodo del modelo
                $modelo = new Usuarios();
                $modelo->añadirAdmins($nombre, $apellidos, $correo, $passwd, $nombreUser);

                // Redirige al Gstor de admins al registrar administrador
                header("Location: index.php?action=GestionAdmin");
                exit();//Finaliza la ejecucion del script para que ocurra la redireccion
            } else {
                require_once "vista/usuarios/AnadirAdmin.php";
            }
        }

        public function GestionClientes(){//Metodo para ver todos los clientes
            $this->checkAdmin();

            $modelo=new Usuarios();

            //Configuracion de la paginacion
            $users = 5;
            $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            if($paginaActual < 1) $paginaActual = 1;

            $inicio=($paginaActual-1)*$users;

            //Obtener los datos del modelo
            $totalClientes = $modelo->contarClientes();
            $totalPaginas = ceil($totalClientes / $users);

            //Obtenemos todos los Clientes de la pagina
            $clientes=$modelo->mostrarClientes($inicio,$users);

            //Cargar la vista con los admis
            require_once "vista/usuarios/GestionClientes.php";
        }
        //Menu para el admin
        
        public function MenuAdmin(){//Menu del administrador
            $this->checkAdmin();
            require_once "vista/MenuAdmin.php";
        }

        public function EliminarUsuario(){//Metodo para eliminar un usuario
            $this->checkAdmin();
            if(isset($_GET['id'])){
                $id=(int)$_GET['id'];
                $origen = $_GET['from']?? '';

                $modelo=new Usuarios();
                $modelo->eliminarUsuarios($id);

                // Redirección dinámica
                if ($origen === 'GestionAdmin') {//Si se elimina el usuario desde GestionAdmin se redirigira a Gestion Admin
                    header("Location: index.php?action=GestionAdmin");
                } else {//Si no se redirigira a GestionEquipos
                    header("Location: index.php?action=GestionClientes");
                }
                exit();
            }
        }

        public function EditarPerfil(){//Metodo para editar el perfil de un usuario logueado
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $id=$_SESSION['id'];
                $nombre=$_POST['nombre']??"";
                $apellidos=$_POST['apellidos']??"";
                $nombreUser=$_POST['nombreUser'] ?? "";
                $correo=$_POST['correo'] ?? "";
                $passwd=$_POST['passwd']?? "";
                $passwd2=$_POST['passwd2'] ?? "";
                $passwdHash="";

                $modelo=new Usuarios();

                if(!empty($passwd)&&!empty($passwd2)){
                    if($passwd===$passwd2&&strlen($passwd) >= 8){
                        $passwdHash=password_hash($passwd,PASSWORD_DEFAULT) ?? "";
                    }else{
                       $error = "Las contraseñas no coinciden o tienen menos de 8 caracteres.";
                    }
                }
                if(!isset($error)){
                    $modelo->editarPerfil($id,$nombre,$apellidos,$nombreUser,$correo,$passwdHash);

                    $_SESSION['nombre'] = (!empty($nombreUser)) ? $nombreUser : $_SESSION['nombre'];
                    $_SESSION['nombre_real']=(!empty($nombre)) ? $nombre : $_SESSION['nombre_real'];
                    $_SESSION['apellidos']=(!empty($apellidos)) ? $apellidos : $_SESSION['apellidos'];
                    $_SESSION['correo']=(!empty($correo)) ? $correo : $_SESSION['correo'];


                    header("Location: index.php?action=configuracion&success=1");
                    exit();
                }
            }
            require_once "vista/usuarios/EditarPerfil.php";
        }

        public function EditarUsuario(){//Metodo para editar el rol de los Usuarios
            $this->checkAdmin();
            if($_SERVER['REQUEST_METHOD']=='POST' && isset($_GET['id'])){
                $id=$_GET['id'];
                $rol=$_POST['rol']?? "";
                $origen = $_GET['from']?? '';//Origen segun el tipo de usuario al que se le quiera cabiar el rol

                $modelo=new Usuarios();

                $modelo->editarUsuarios($id,$rol);

                // Redirección dinámica
                if ($origen === 'GestionAdmin') {//Si se elimina el usuario desde GestionAdmin se redirigira a Gestion Admin
                    header("Location: index.php?action=GestionAdmin");
                } else {//Si no se redirigira a GestionEquipos
                    header("Location: index.php?action=GestionClientes");
                }
                exit();
            }
            require_once "vista/usuarios/EditarUsuarios.php";
        }

        public function CambiarIMgPerfil(){//Metodo para cambiar la imagen de usuario
            if($_SERVER['REQUEST_METHOD']=='POST'){
                 if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
                    $id=$_SESSION['id'];
                    $nombreImg=$_FILES['imagen']['name'];

                    $rutaTemporal = $_FILES['imagen']['tmp_name'];
                    
                    // Creamos la ruta
                    $carpetaDestino = "assets/img/users/";
                    // Si la carpeta no existe, la creamos
                    if (!file_exists($carpetaDestino)) {
                        mkdir($carpetaDestino, 0777, true);
                    }

                    $rutaFinal = $carpetaDestino . time() . "_" . $nombreImg;

                    if (move_uploaded_file($rutaTemporal, $rutaFinal)) {
                        $modelo = new Usuarios();
                        $modelo->CambiarIMgPerfil($id,$rutaFinal);
                        $_SESSION['IMAGEN']=$rutaFinal;
                        header("Location: index.php?action=configuracion&success=1");
                        exit();
                    } else {
                        header("Location: index.php?action=configuracion&error=pass");
                        exit();
                    }
                } else {
                    header("Location: index.php?action=configuracion&error=pass");
                    exit();
                }
            }
            require_once "vista/usuarios/CambiarIMGPerfil.php";
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $usuarioInput = $_POST['usuario'];
                $passwd = $_POST['passwd'];
                $recordar=$_POST['recordar']??null;

                $modelo = new Usuarios();
                $datosUsuario = $modelo->login($usuarioInput, $passwd);

                if($datosUsuario){
                    // GUARDAR TODO EN LA SESIÓN (Importante para el header y editar los datos del usuario en un futuro)
                    $_SESSION['id'] = $datosUsuario['ID_USUARIO'];
                    $_SESSION['nombre'] = $datosUsuario['NOMBRE_USUARIO'];
                    $_SESSION['nombre_real']=$datosUsuario['NOMBRE'];
                    $_SESSION['apellidos']=$datosUsuario['APELLIDOS'];
                    $_SESSION['correo']=$datosUsuario['CORREO'];
                    $_SESSION['ROL'] = $datosUsuario['ROL']; // Sin esto, el header no cambia
                    $_SESSION['IMAGEN'] = $datosUsuario['IMAGEN_USER'];
                    //Si se le dio a la opcion de recordar se guardara una cookie que dure 30 dias
                    if($recordar){
                        setcookie("furboshirts_remember_me",$_SESSION['nombre'],time()+(30*24*60*60),"/");//Creamos una cookie que dure 30 días
                    }else{
                        setcookie("furboshirts_remember_me",$_SESSION['nombre'],time()-3600, "/");//Si no marco la casilla, borramos la cookie (poniendo pasado)
                    }

                    if($datosUsuario['ROL']!=='admin'){//Si no es un admin se redirigira al inicio de la pagina
                        header("Location: index.php?action=inicio");
                        exit(); 
                    }else{//Si es admin se redirigira a su propio menu
                        header("Location: index.php?action=MenuAdmin");
                        exit(); //Finaliza la ejecucion del script para que ocurra la redireccion
                    }
                } else {//Saltara error si el login es incorrecto
                    $error = "Usuario o contraseña incorrectos";
                    require_once "vista/usuarios/login.php";
                }
            } else {
                require_once "vista/usuarios/login.php";
            }
        }

        public function registrar(){//Metodo para registrar un usuario
            if($_SERVER['REQUEST_METHOD'] == 'POST'){//Recogida de datos del formulario
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $correo = filter_var($_POST['correo'],FILTER_SANITIZE_EMAIL);
                $passwd = $_POST['passwd'] ?? ''; 
                $nombreUser = $_POST['nombreUser'];

                // Validamos que el correo sea correcto antes de continuar
                if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    die("Error: El formato del correo electrónico no es válido.");
                }

                if(strlen($passwd) >= 8){
                    $passwdHash=password_hash($passwd, PASSWORD_DEFAULT);
                    //Llamada al metodo del modelo
                    $modelo = new Usuarios();
                    $modelo->registrar($nombre, $apellidos, $correo, $passwdHash, $nombreUser);

                    // Redirige al login al registrar usuario
                    header("Location: index.php?action=login");
                    exit();//Finaliza la ejecucion del script para que ocurra la redireccion
                }else{
                    $error = "Las contraseñas no coinciden o tienen menos de 8 caracteres.";
                }
            }
             require_once "vista/usuarios/registrar.php";
        }

        public function logout(){
            session_start();//Reanudar sesion existente para manipular los datos $_SESSION
            session_unset();//Elimina todas las variables de la sesion actual
            session_destroy();//Destruye todas las sesiones

            header("Location: index.php?action=login");//Redirije al login
            exit();//Finaliza la ejecucion del script para que ocurra la redireccion
        }

        public function solicitarRecuperacion(){//Metodo para Generar un token y mandar un correo 
            if($_SERVER['REQUEST_METHOD']==='POST'){
                // Capturamos el correo del formulario POST
                $correo = filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL);

                if($correo){
                    $modelo=new Usuarios();

                    //Generamos un token seguro de 64 caracteres
                    $token=bin2hex(random_bytes(32));
                    //Tiempo de vida el enlace: 2horas
                    $expiracion=date("Y-m-d H:i:s", strtotime("+2 hours"));

                    //Guardar los datos del token en la BSD
                    $modelo->registrarTokenRecuperacion($correo,$token,$expiracion);

                    //Construccion de la URL
                    $url=rutasURLRecuperacion($token,$correo);//Metodo para contruir una URL segun si estamos en el dominio o en local en config.php

                    //Envio con PHPMailer
                    $mail=new PHPMailer(true);

                    try{
                        // ACTIVAR SMTP (Crucial para que conecte con Gmail)
                        $mail->isSMTP(); 

                        // Configuración del servidor SMTP
                        $mail->Host       = 'smtp.gmail.com'; 
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'lopezreinarobledilloruben@gmail.com'; 
                        $mail->Password   = 'qqwp zfzv agys nqfa'; // Tu contraseña de aplicación segura
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port       = 587;
                        $mail->CharSet    = 'UTF-8'; // Mantiene tildes y eñes correctamente

                        $mail->setFrom('lopezreinarobledilloruben@gmail.com', 'FurboShirts Tienda Deportiva');
                        $mail->addAddress($correo);

                        $mail->isHTML(true);
                        $mail->Subject = 'Recuperacion de contrasena - FurboShirts';
                        $mail->Body    = "<h3>Restablece tu cuenta</h3>
                                        <p>Has solicitado un cambio de contraseña. Haz clic en el siguiente enlace para continuar:</p>
                                        <p><a href='{$url}'>Cambiar mi contraseña aquí</a></p>
                                        <p>Este enlace caducará en 2 horas.</p>";
                        
                        $mail->send();
                        $success = "Si el correo existe, recibirás un enlace en unos instantes.";
                    }catch(Exception $e){
                        $error="Error al enviar el correo de recuperacion";
                    }
                }
            }
            require_once "vista/usuarios/solicitar.php";
        }

        public function restablecerPassword(){//Metodo para Actualizar la contraseña
            //Leemos las variables directas de la URL
            $correo =$_GET['e']?? $_POST['correo']??'';
            $tokenURL=$_GET['t']?? $_POST['token'] ?? '';

            if(empty($correo)||empty($tokenURL)){
                die("Acceso denegado");
            }

            $modelo=new Usuarios();
            $datosToken=$modelo->verificarTokenUsuario($correo);

            //Compararemos la fecha actual con la fecha del token
            $fechaActual=date("Y-m-d H:i:s");

            if (!$datosToken || $datosToken['TOKEN_RECUPERACION'] !== $tokenURL || $fechaActual > $datosToken['EXPIRACION_TOKEN']) {
                die("El enlace de recuperación es inválido o ya ha caducado.");
            }

            //Si la validacion es correcta y el usuario envia el fomrulario con su nueva clave
            if($_SERVER['REQUEST_METHOD']==="POST"){
                $pass1=$_POST['passwd']??'';
                $pass2=$_POST['passwd2']??'';

                if ($pass1 === $pass2 && strlen($pass1) >= 8) {
                    // Hasheamos la contraseña nueva
                    $nuevoHash = password_hash($pass1, PASSWORD_DEFAULT);
                    
                    // Actualiza en usuarios y limpia el token para que no se pueda reutilizar
                    $modelo->actualizarContraseña($correo, $nuevoHash);
                    
                    header("Location: index.php?action=login&msg=success_password");
                    exit();
                } else {
                    $error = "Las contraseñas no coinciden o tienen menos de 8 caracteres.";
                }
            }
            require_once "vista/usuarios/cambiar_password.php";
        }
    }
?>