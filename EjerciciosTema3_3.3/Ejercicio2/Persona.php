<?php
    class Persona{
        public $nombre;
        public $edad;


        public function __construct($n,$e){
            $this->nombre=$n;
            $this->edad=$e;
        }

        public function presentarse(){
            return "Hola me llamo ".$this->nombre." y tengo ".$this->edad;
        }
    }

    class Empleado extends Persona{
        public $salario;

        public function __construct($n,$e,$s){
            parent::__construct($n,$e);
            $this->salario=$s;
        }

        public function presentarse(){
            return "Hola me llamo ".$this->nombre." tengo ".$this->edad." y cobro ".$this->salario."€";
        }
    }

    $empleado=new Empleado("Ruben",23,4500);

    echo $empleado->presentarse();
?>
