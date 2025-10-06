<?php
   abstract class Usuario{
    public string $usuario;
    public string $contraseña;
    public static int $contador=0;

    public function __construct(string $user,string $pass){
        $this->usuario=$user;
        $this->contraseña=$pass;
        self::$contador++;
    }
    abstract public static function mostrarNumeroUsers();
   }

   class UsuarioRegular extends Usuario{
    public function __construct(string $user,string $pass){
        parent::__construct($user,$pass);
    }

    public static function mostrarNumeroUsers(){
        return "El numero de usuarios es de ".self::$contador;
    }
   }

   class UsuarioAdmin extends Usuario{
    public function __construct(string $user,string $pass){
        parent::__construct($user,$pass);
    }

    public static function mostrarNumeroUsers(){
        return "El numero de usuarios es de ".self::$contador;
    }
   }
   $regular=new UsuarioRegular("David",1234);
   $admin=new UsuarioAdmin("Piter",1234);
   echo $admin->mostrarNumeroUsers();
?>
