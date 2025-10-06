<?php
    Interface Saludable{
        public function realizarEjercicio();
    }

    class Persona{
        public string $nombre;
        public int $edad;

        public function __construct($n,$e){
            $this->nombre=$n;
            $this->edad=$e;
        }

        public function presentarse(){
            return "Hoy soy ".$this->nombre." y tengo ".$this->edad." años";
        }
    }

    class Deportista extends Persona implements Saludable{
        public function __construct($n,$e){
            parent::__construct($n,$e);
        }

        public function realizarEjercicio(){
            return $this->nombre." esta haciendo Ejercicio";
        }
    }

    $deportista=new Deportista("Carlos",24);

    echo $deportista->presentarse()."<br>";
    echo $deportista->realizarEjercicio()."<br>";
?>