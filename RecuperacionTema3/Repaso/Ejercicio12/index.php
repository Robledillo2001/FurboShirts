<?php
    abstract class Usuario{
        public $nombre;
        
        public function __construct($nombre){
            $this->nombre=$nombre;
            self::$contadorUsuarios+=1;
        }
        static $contadorUsuarios=0;
    }

    class UsuarioRegular extends Usuario{
        public function __construct($nombre){
            parent::__construct($nombre);
        }
    }

    class UsuarioAdmin extends Usuario{
        public function __construct($nombre){
            parent::__construct($nombre);
        }
    }

    $usuario1=new UsuarioAdmin("Pablo");
    $usuario2=new UsuarioRegular("Pepe");

    echo "Usuarios conectados: ".Usuario::$contadorUsuarios;
?>
