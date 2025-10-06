<?php
    abstract class Figura{
        protected float $area;
        public function __construct(){
            $this->area=0;
        }
        abstract protected function calcularArea();

        public function mostrarArea(){
            return "Area total de la Figura es de ".$this->calcularArea()."cm<br>";
        }
    }

    class Rectangulo extends Figura{
        public float $base;
        public float $altura;
        public function __construct($b,$a){
            parent::__construct();
            $this->base=$b;
            $this->altura=$a;
        }

        protected function calcularArea(){
            $this->area=$this->base*$this->altura;
            return $this->area;
        }
    }

    class Circulo extends Figura{
        public float $radio;
        public function __construct($r){
            parent::__construct();
            $this->radio=$r;
        }

        protected function calcularArea(){
            $this->area=pi()*pow($this->radio,2);;
            return $this->area;
        }
    }

    $rectangulo=new Rectangulo(5,10);
    echo $rectangulo->mostrarArea();

    $circulo=new Circulo(7);
    echo $circulo->mostrarArea();
?>
