<?php
    interface Saludable{
        public function realizarEjercicio();
    }

    class Persona{
        protected string $nombre;
        protected int $edad;

        public function __construct($n,$e){
            $this->nombre=$n;
            $this->edad=$e;
        }

        public function presentarse(){
            return "Hola soy".$this->nombre." y tengo ".$this->edad;
        }
    }

    class Deportista  extends Persona implements Saludable{
        public function realizarEjercicio(){
            return"Deportista haciendo ejercicio";
        }
    }
    $deportista=new Deportista("Ruben",23);

    echo $deportista->presentarse();
    echo $deportista->realizarEjercicio();
?>