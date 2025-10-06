<?php
    class Usuario{
        public static $rolesPermitidos=[
            "admin",
            "editor",
            "usuario"
        ];
        public $rol;

        public function __construct($rol){
            if(in_array($rol,self::$rolesPermitidos)){
                $this->rol=$rol;
            }
        }

        public static function anadirRol($rol){
            if(!in_array($rol,self::$rolesPermitidos)){
                self::$rolesPermitidos[]=$rol;
                return"$rol añadido";
            }else{
                return "El rol ya existe";
            }
        }

        public function mostrarRoles() {
            echo "Roles permitidos: <br>";
            foreach (self::$rolesPermitidos as $rol) {
                echo $rol . "<br>";
            }
        }
    }
    // Ejemplo de uso
    $usuario = new Usuario("editor");
    echo "Rol asignado: " . $usuario->rol . "<br>";

    // Añadir un nuevo rol
    echo Usuario::anadirRol("moderador")."<br>";

    // Intentar añadir un rol que ya existe
    echo Usuario::anadirRol("admin")."<br>";

    // Mostrar todos los roles
    echo $usuario->mostrarRoles();
?> 