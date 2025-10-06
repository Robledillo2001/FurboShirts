<?php
    interface Figuras{
        public function calcularArea();
    }

    class Circulo implements Figuras{
        public float $radio;
        public function __construct(float $radio){
            $this->radio=$radio;
        }

        public function calcularArea(){
            return pi()*pow($this->radio,2)."<br>";
        }
    }

    class Cuadrado implements Figuras{
        public float $lado;
        public function __construct(float $lado){
            $this->lado=$lado;
        }

        public function calcularArea(){
            return pow($this->lado,2)."<br>";
        }
    }

    class Triangulo implements Figuras{
        public float $base;
        public float $altura;
        public function __construct(float $base,float $altura){
            $this->base=$base;
            $this->altura=$altura;
        }

        public function calcularArea(){
            return (($this->base*$this->altura)/2)."<br>";
        }
    }
    $cuadrado=new Cuadrado(6);
    $circulo=new Circulo(6);
    $triangulo=new Triangulo(6,5);

    echo $cuadrado->calcularArea();
    echo $circulo->calcularArea();
    echo $triangulo->calcularArea();
?>