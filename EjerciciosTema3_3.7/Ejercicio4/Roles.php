<?php
    class Usuario{
        public string $nombre;
        public string $contraseña;
        public string $rol;
        private static array $roles=["admin","editor","usuario"];

        public function __construct(string $name,string $password,string $rol){
            $this->nombre=$name;
            $this->contraseña=$password;
            $this->rol=$rol;
        }

        public static function añadirRol($rol){
            if (!in_array($rol, self::$roles)) {
                self::$roles[] = $rol;
                echo "Rol '$rol' añadido a los roles permitidos.<br>";
            } else {
                echo "El rol '$rol' ya está permitido.<br>";
            }
        }
        public function autenticar(){
            if (in_array($this->rol, self::$roles)) {
                echo "Usuario autenticado con éxito. Rol: $this->rol<br>";
                return true;
            } else {
                echo "Autenticación fallida. Rol '$this->rol' no permitido.<br>";
                return false;
            }
        }
    }
    $usuario=new Usuario("Ruben","1234","Programador");
    $usuario->autenticar();
    $usuario->añadirRol($usuario->rol);
    $usuario->autenticar();
?>