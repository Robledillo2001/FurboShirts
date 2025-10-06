<?php
    class Forma{
        public $color;
        
        public function __construct($c){
            $this->color=$c;
        }

        public function getColor(){
            return $this->color."<br>";
        }

        public function setColor($c){
            $this->color=$c;
        }
    }

    class Circulo extends Forma{
        public $radio;

        public function __construct($c,$r){
            parent::__construct($c);
            $this->radio=$r;
        }

        public function getRadio(){
            return $this->radio."<br>";
        }

        public function setRadio($r){
            $this->radio=$r;
        }

        public function calcularArea(){
            return "Area de circulo=".pi()*pow($this->radio,2)."<br>";
        }
    }

    class Cuadrado extends Forma{
        public $longitud;
        public $base;

        public function __construct($c,$b,$l){
            parent::__construct($c);
            $this->base=$b;
            $this->longitud=$l;
        }

        public function getBase(){
            return $this->base."<br>";
        }

        public function setBase($b){
            $this->base=$b;
        }

        public function getALtura(){
            return $this->longitud."<br>";
        }

        public function setAltura($l){
            $this->longitud=$l;
        }

        public function calcularArea(){
            return "Area del cuadrado=".$this->base*$this->longitud;
        }
    }
    $circulo=new Circulo("Rojo",7);
    echo $circulo->calcularArea();

    $cuadrado=new Cuadrado("Azul",8,14);
    echo $cuadrado->calcularArea();
?>
