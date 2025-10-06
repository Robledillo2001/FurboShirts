<?php
    require_once "modelo/usuarios_modelo.php";//Archivo que contiene el objeto de uSUARIO
    class Usuarios_Controlador{//Funcion para el menu de inicio
        public function inicio(){//Metodo para acceder al inicio de la pagina
            require_once "vista/inicio.php";
        }

        public function opcionesUsuario(){//Metodo con el menu de cambiar datos del usuario
            require_once "vista/opcionesUsuario.php";
        }

        public function logout(){//Metodo que contiene la vista de cerrar sesion
            require_once "vista/logout.php";
        }
        public function añadirUser(){//Funcion para añadir usuarios
            $usuario=new Usuarios();//Objeto de usuarios del modelo
            if($_SERVER['REQUEST_METHOD']==='POST'){//Acceder a los datos del post
                $nombre_usuario=$_POST['usuario'];
                $nombre=$_POST['nombre'];
                $apellidos=$_POST['apellidos'];
                $dni=$_POST['dni'];
                $contraseña=$_POST['contraseña'];
                $correo=$_POST['correo'];
                $rol=$_POST['rol'];
                $imagen=$_FILES['imagen'];    

                $directorio="imagenes/";//Directorio donde se guardan las imagenes

                if (preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,}$/", $correo)) {
                    if (isset($_FILES['imagen'])&& $_FILES['imagen']===UPLOAD_ERR_OK) {//Si la imagen de usuario no esta la añadira
                        $tiposPermitidos=['image/jpeg',"image/png","image/gif"];//Array unidimensional con los tipos de archivos que se pueden guardar

                        if($imagen['size']>3 *1024 *1024){//si la imagen supera la capacidad salta el mensaje
                            die("Imagen supera la capacidad permitida");
                        }

                        if(!in_array($imagen['type'],$tiposPermitidos)){//Si se intenta guardar un tipo de archivo que no este en el array salta mensaje
                            die("Tipo de imagen no permitida");
                        }

                        $ruta=$directorio.basename($imagen['name']);//Nombre de la ruta de la imagen
                        $resultado=$usuario->añadirUsuarios($nombre_usuario,$nombre,$apellidos,$dni,$contraseña,$rol,$correo,$ruta);//Llamada a la funcion del modelo
                        echo $resultado;//Imprimir el resultado
                        setcookie("mensaje", "Usuario creado correctamente", time() + 5, "/");
                    }else{//Si esta vacia y salta error
                        $resultado=$usuario->añadirUsuarios($nombre_usuario,$nombre,$apellidos,$dni,$contraseña,$rol,$correo);//Llamada a la funcion del modelo con la ruta por defecto
                        echo $resultado;//Imprimir el resultado
                        setcookie("mensaje", "Usuario creado correctamente", time() + 5, "/");
                    }
                } else {
                    echo "Correo inválido";
                }
                
            }
            require_once "vista/añadirUsuarios.php";//Vista de añadir usuarios
        }

        public function login(){//Metodo para el login
            $modeloUsuario = new Usuarios();//Crear objeto de tipo usuario
            if($_SERVER['REQUEST_METHOD']==='POST'){//Llamada a datos del post
                $usuario=$_POST['usuario'];
                $contraseña=$_POST['contraseña'];
                $recordar=$_POST['recordar'];

                $userRegistrado = $modeloUsuario->login($usuario,$contraseña);//Datos del usuario

                if(!empty($userRegistrado)){//Si no esta vacio
                    echo "Iniciando Sesion. Redirigiendo.....";
                    //Se guardaran valores de sesion
                    $_SESSION['nombre']=$usuario;//Como el nombre
                    $_SESSION['id_usuario']=$userRegistrado['ID'];
                    $_SESSION['rol']=$userRegistrado['rol'];//Su rol
                    $_SESSION['correo']=$userRegistrado['correo'];//El correo
                    $_SESSION['ruta']=$userRegistrado['img_usuario'];//La ruta de la imagen de usuario
                    if($recordar){//Si se pulsa en el boton de recordar
                        setcookie("usuario",$usuario,time()+(86400*7),"/","",true,true);//Cookie de usuario que se crea al iniciar sesion que dura 7 dias
                    }else{
                        setcookie("usuario","",time()-3600,"/");//Si no no se guardara y se pondra una de
                    }

                    header("Location: index.php?action=inicio");//Y se redirigira a inicio
                    exit;
                }else{
                    echo "Usuario o contraseña incorrectos";//Si no nos mostrara un aviso
                }
            }
            require_once "vista/login.php";//vista del login
        }

        public function modificarImgUsuario() {//Metodo para modificar la imagen de usuario
            $usuario = new Usuarios();
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {//Si no hay imagen
                    die("No se ha enviado ninguna imagen o ocurrió un error.");
                }
        
                $imagen = $_FILES['imagen'];//Archivo de imagen
        
                if ($imagen['size'] > 3 * 1024 * 1024) {//Si suoera el limite
                    die("Imagen supera la capacidad permitida (3MB)");
                }
        
                $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];//Array con los tipos de imagen permitidos
        
                if (!in_array($imagen['type'], $tiposPermitidos)) {//Si el archivo no es permitido no se guarda la imagen
                    die("Tipo de imagen no permitida");
                }
        
                $directorio = "imagenes/";
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777, true);
                }
        
                // Generar nombre único
                $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
                $nombreArchivo = uniqid("img_", true) . "." . $extension;
                $rutaDestino = $directorio . $nombreArchivo;
        
                // Mover la imagen al servidor
                if (!move_uploaded_file($imagen['tmp_name'], $rutaDestino)) {
                    die("Error al subir la imagen");
                }
        
                // Verificar ID de sesión
                if (!isset($_SESSION['id_usuario'])) {
                    die("Usuario no identificado");
                }
        
                $id_usuario = $_SESSION['id_usuario'];
        
                // Actualizar imagen en la base de datos
                $resultado = $usuario->modificarImgUsuario($rutaDestino, $id_usuario);
        
                if ($resultado) {
                    $_SESSION['ruta'] = $rutaDestino;//Guardamos la ruta en la sesion de la misma
                    setcookie("ultimaImagen",$_SESSION['ruta'],time()+3600);
                    echo "Imagen de perfil modificada";
                } else {
                    die("Error al modificar la imagen en la base de datos");
                }
            }
        
            require_once "vista/cambiarImg.php";
        }

        public function eliminarUsuarios(){//Metodo para eliminar a los usuarios de la BSD
            $usuario=new Usuarios();

            if($_SERVER['REQUEST_METHOD']==="POST"){//Sacar los valores del formulario
                $id_usuario=$_POST['usuario'];
                
                echo $usuario->eliminarUsuario($id_usuario);
            }
            $usuarios=$usuario->mostrarUsuarios($_SESSION['id_usuario']);
            require_once "vista/eliminarUsuarios.php";
        }

        public function verUsuarios(){//Funcion para ver los usuarios de la BSD
            $usuario=new Usuarios();//oBEJTO USUARIOS

            //TAMAÑO DE LA PAGINA, NUMERO DE PAGINA E INICIO
            $tamaño_pg=3;
            $pagina=isset($_GET['pagina'])?(int)$_GET['pagina']:1;
            $inicio=($pagina-1)*$tamaño_pg;

            //DATOS SQL DE USUARIOS Y EL TOTAL
            $datos=$usuario->verUsuarios($inicio,$tamaño_pg);
            $total=$usuario->totalUsuarios();

            //MEDIA DE LAS PAGINAS DE USUARIOS
            $total_paginas=ceil($total['total']/$tamaño_pg);
            require_once "vista/verUsuarios.php";
        }

        public function cambiarNombre(){//Funcion para cambiar el nombre de usuario
            $usuario=new Usuarios();
            if($_SERVER['REQUEST_METHOD']==="POST"){//Sacar datos del post
                $nombre=$_POST['nombre'];

                echo $usuario->cambiarNombre($_SESSION['id_usuario'],$nombre);//Mensaje de que se actualizo el nombre
                if(isset($_COOKIE['usuario'])){//Si la cookie de inicio de sesion existe se cambia el valor de la misma por el nuevo nombre
                    setcookie("usuario",$nombre,time()+(86400*7),"/","",true,true);//Cookie de usuario que se crea al iniciar sesion que dura 7 dias
                    $_SESSION['nombre']=$nombre;//Variable sesion de nombre se cambia al nuevo
                }
                
            }
            require_once "vista/cambiarNombre.php";
        }

        public function cambiarContraseña(){//Metodo para cambiar la contraseña de usuario
            $usuario=new Usuarios();
            if($_SERVER['REQUEST_METHOD']==="POST"){
                $contraseña_actual=$_POST['actual'];
                $contraseña_nueva=$_POST['nueva'];
                $repeticon_contraseña_nueva=$_POST['rep'];

                

                if($contraseña_nueva===$repeticon_contraseña_nueva){//Verificamos que la repetecion de contraseña sea la misma contraseña que pusimos
                    $contraseña_nueva_hash=password_hash($contraseña_nueva,PASSWORD_DEFAULT);//Hasheamos la contraseña nueva
                    echo $usuario->cambiarContraseña($_SESSION['id_usuario'],$contraseña_actual,$contraseña_nueva_hash);//Añadimos la contraseña
                }else{
                    echo "Las contraseñas no son las mismas";
                }
            }
            require_once "vista/cambiarContraseña.php";
        }

        public function cambiarDatos(){//Metodo para cambiar los datos de usuario
            $usuario=new Usuarios();
            if($_SERVER['REQUEST_METHOD']==="POST"){
               $nombre=$_POST['nombre'];
               $apellidos=$_POST['apellidos'];
               $dni=$_POST['dni'];

               $nombre_completo=$nombre." ".$apellidos;

               echo $usuario->cambiarDatos($_SESSION['id_usuario'],$nombre_completo,$dni);
            }
            require_once "vista/cambiarDatos.php";
        }
    }
?>