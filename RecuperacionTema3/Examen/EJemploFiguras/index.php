<?php
    interface Figura{
        public function calcularArea();
    }

    class Triangulo implements Figura{
        public int $base;
        public int $altura;
        public function __construct($b,$a){
            $this->base=$b;
            $this->altura=$a;
        }

        public function calcularArea(){
            $resultado=($this->base*$this->altura)/2;
            return $resultado;
        }
    }

    class Cuadrado implements Figura{
        public int $lado;
        public function __construct($l){
            $this->lado=$l;
        }

        public function calcularArea(){
            $resultado=$this->lado*$this->lado;
            return $resultado;
        }
    }

    class Circulo implements Figura{
        public int $radio;
        public function __construct($r){
            $this->radio=$r;
        }

        public function calcularArea(){
            $resultado=pi()*pow($this->radio,2);
            return $resultado;
        }
    }

    class Rectangulo implements Figura{
        public int $base;
        public int $altura;
        public function __construct($b,$a){
            $this->base=$b;
            $this->altura=$a;
        }

        public function calcularArea(){
            $resultado=$this->base*$this->altura;
            return $resultado;
        }
    }

    // Pruebas
    $circulo = new Circulo(4);
    echo "Área del Círculo: " . $circulo->calcularArea() . "<br>";

    $cuadrado = new Cuadrado(4);
    echo "Área del Cuadrado: " . $cuadrado->calcularArea() . "<br>";

    $triangulo = new Triangulo(5, 10);
    echo "Área del Triángulo: " . $triangulo->calcularArea() . "<br>";

    $rectangulo = new Rectangulo(6, 3);
    echo "Área del Rectángulo: " . $rectangulo->calcularArea() . "<br>";
?>