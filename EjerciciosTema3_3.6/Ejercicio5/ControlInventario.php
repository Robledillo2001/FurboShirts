<?php
    abstract class Producto{
        public string $nombre;
        public int $cantidad;
        public float $precio;

        public function __construct(string $n,int $c,float $p){
            $this->nombre=$n;
            $this->cantidad=$c;
            $this->precio=$p;
        }

        abstract public function calcularStock();
    }

    class ProductoPerecedero extends Producto{
        public function __construct(string $n,int $c,float $p){
            parent::__construct($n,$c,$p);
        }

        public function calcularStock(){
            return $this->precio*$this->cantidad;
        }
    }

    class ProductoNoPerecedero extends Producto{
        public function __construct(string $n,int $c,float $p){
            parent::__construct($n,$c,$p);
        }

        public function calcularStock(){
            return $this->precio*$this->cantidad;
        }
    }
    $perecedero=new ProductoPerecedero("comida",120,32);
    echo "El precio total del stock es de ".$perecedero->calcularStock()."€<br>";

    $Noperecedero=new ProductoNoPerecedero("juegos",567,73);
    echo "El precio total del stock es de ".$Noperecedero->calcularStock()."€<br>";
?>
