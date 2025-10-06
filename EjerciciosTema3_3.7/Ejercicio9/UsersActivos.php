<?php
    class UsuarioActivo{
        public static $usuariosActivos;

        public function __construct(){
            self::$usuariosActivos++;
        }

        public static function cerrarSesion(){
            self::$usuariosActivos--;
        }

        public function mostrarUsuarios(){
            return self::$usuariosActivos;
        }
    }
    $usuario1=new UsuarioActivo();
    $usuario2=new UsuarioActivo();
    $usuario3=new UsuarioActivo();
    $usuario4=new UsuarioActivo();

    echo $usuario3->mostrarUsuarios()."<br>";
    $usuario1->cerrarSesion();
    echo $usuario2->mostrarUsuarios()."<br>";
?>
