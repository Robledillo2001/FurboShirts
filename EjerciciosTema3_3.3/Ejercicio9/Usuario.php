<?php
    class Usuario{
        public $nombre;
        public $email;

        public function __construct($n,$e){
            $this->nombre=$n;
            $this->email=$e;
        }

        public function getNombre(){
            return $this->nombre."<br>";
        }

        public function setNombre($n){
            $this->nombre=$n;
        }

        public function getEmail(){
            return $this->nombre."<br>";
        }

        public function setEmail($e){
            $this->email=$e;
        }

        public function mostrarInfo(){
            $info =  "NOMBRE:".$this->nombre."<br> EMAIL:".$this->email."<br>";
            return $info;
        }
    }
    class Administrador extends Usuario{
        public $rol;

        public function __construct($n,$e,$r){
            parent::__construct($n,$e);
            $this->rol=$r;
        }

        public function getRol(){
            return $this->rol."<br>";
        }

        public function setRol($rol){
            $this->rol=$rol;
        }

        public function mostrarInfo(){
            $info = parent::mostrarInfo() ."ROL:". $this->rol."<br>";        
            return $info;
        }
    }

    $user= new Usuario("Ruben","robleboss@gmail.com");
    $admin=new Administrador("David","rhrfrjkfbr@gamil.com","JEFE");

    echo $user->mostrarInfo();
    echo $admin->mostrarInfo();
?>
