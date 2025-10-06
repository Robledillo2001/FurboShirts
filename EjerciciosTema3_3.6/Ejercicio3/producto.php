<?php
    abstract class Producto{
        public $nombre;
        public float $precio;

        public function __construct($n, float $p){
            $this->nombre=$n;
            $this->precio=$p;
        }

        public function calcularDescuento($d){
            
        }
    }

    class ProductoElectronico extends Producto{
        public function __construct($n,float $p){
            parent::__construct($n,$p);
        }

        public function calcularDescuento($descuento){
            $descuento/=100;

            $this->precio*=$descuento;
            return $this->precio;
        }
    }

    class ProductoRopa extends Producto{
        public function __construct($n,float $p){
            parent::__construct($n,$p);
        }

        public function calcularDescuento($descuento){
            $descuento/=100;

            $this->precio*=$descuento;
            return $this->precio;
        }
    }

    $Electrodomestico=new ProductoElectronico("TV",1230.45);
    echo $Electrodomestico->calcularDescuento(2)."<br>";

    $ropa=new ProductoRopa("Pantalon",34);
    echo $ropa->calcularDescuento(9);
?>
