<?php
   Interface Auntenticable{
    public function iniciarSesion($u,$c);
   }

   Interface Registrable{
    public function registrarUsuario($u,$c);
   }

   class Usuario implements Auntenticable,Registrable{
    private $usuario;
    private $contraseña;

    public function __construct($u,$c){
        $this->usuario=$u;
        $this->contraseña=$c;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getContraseña(){
        return $this->contraseña;
    }

    public function setUsuario($u){
        $this->usuario=$u;
    }

    public function setContraseña($c){
        $this->contraseña=$c;
    }

    public function registrarUsuario($u,$c){
        $this->setUsuario($u);
        $this->setContraseña($c);
        return "El usuario ".$this->getUsuario()."se ha registrado";
    }

    public function iniciarSesion($u,$c){
        if($this->usuario==$u&&$this->contraseña==$c){
            return "Inicio de sesion correcto";
        }else{
            return "Inicio de sesion fallido el usuario ".$u." y la contraseña ".$c." no son correctos";
        }
    }
   }

   $usuario=new Usuario("","");

   echo $usuario->registrarUsuario("rUBEN",1234)."<br>";

   echo $usuario->iniciarSesion("rUBEN",1234)."<br>";
?>
