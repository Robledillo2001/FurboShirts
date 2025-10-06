<?php
  interface Autenticable{
    public function iniciarSesion();
  }  

  interface Registrable{
    public function registrarUsuario($u,$c);
  }

  class Usuario implements Autenticable,Registrable{
    private string $usuario;
    private string $contraseña;

    public function __construct($u,$c){
        $this->usuario=$u;
        $this->contraseña=$c;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getContraeña(){
        return $this->contraseña;
    }

    public function setUsuario($u){
        $this->usuario=$u;
    }

    public function setContraseña($c){
        $this->contraseña=$c;
    }

    public function iniciarSesion() {
        // Logic to authenticate the user
        if ($this->usuario === 'admin' && $this->contraseña === '1234') {
            return "Inicio de sesión exitoso";
        }
        return "Credenciales incorrectas";
    }
    
    public function registrarUsuario($u,$c) {
        // Logic to register the user
        return "Usuario '{$this->usuario}' registrado con éxito.";
    }
  }
  $usuario=new Usuario("admin",1234);

  echo "<p>".$usuario->iniciarSesion()."</p>";
  echo "<p>".$usuario->registrarUsuario($usuario->setUsuario("David"),$usuario->setContraseña("4567"))."</p>";
?>