<?php
    class Producto{
        public $nombre;
        public $precio;

        public function __construct(string $n,float $p){
            $this->nombre=$n;
            $this->precio=$p;
        }


        public function getNombre(){
            return $this->nombre."<br>";
        }

        public function setNombre($n){
            $this->nombre=$n;
        }

        public function getPrecio(){
            return $this->nombre."<br>";
        }

        public function setPrecio($p){
            $this->precio=$p;
        }
    }

    class ProductoElectronico extends Producto{
        private $garantia;

        public function __construct(string $n,float $p,int $g) {
            parent::__construct($n,$p);
            $this->garantia = $g;
        }
        public function getGarantia(){
            return $this->garantia."<br>";
        }

        public function setGarantia($g){
            $this->garantia=$g;
        }

        public function mostrarPrecioFinal(){
            $precioFinal=$this->precio*0.20;
            $this->precio+=$precioFinal;

            return "El precio final es de ".$this->precio;
        }
    }

    $producto=new ProductoElectronico("PS5",546,4);
    echo $producto->mostrarPrecioFinal();
?>
