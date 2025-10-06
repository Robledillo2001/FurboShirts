<?php
    interface ProductoInterface{
        public function getPrecio();
        public function getDescripcion();
    }

    abstract class Producto implements ProductoInterface{
        protected string $nombre;
        public float $precio;
        public string $desc;

        public static int $productosVendidos=0;

        public function __construct(string $nombre,float $precio,string $descripcion){
            $this->nombre=$nombre;
            $this->precio=$precio;
            $this->desc=$descripcion;
            self::$productosVendidos+=1;
        }

        abstract function getPrecio();

        abstract function getDescripcion();

        public static function totalProductos(){
            return self::$productosVendidos;
        }
    }

    class ProductoFisico extends Producto{
        public function getPrecio(){
            return "{$this->nombre} cuesta ".$this->precio."€";
        }

        public function getDescripcion(){
            return "{$this->nombre}: ".$this->desc;
        }
    }

    class ProductoDigital extends Producto{
        public function getPrecio(){
            return "{$this->nombre} cuesta ".$this->precio."€";
        }

        public function getDescripcion(){
            return "{$this->nombre}: ".$this->desc;
        }
    }
    $reloj=new ProductoFisico("Reloj",12,"Mira la hora");
    echo $reloj->getDescripcion()."<br>";
    echo $reloj->getPrecio()."<br>";

    $ps5=new ProductoFisico("PS5",12,"Ni aun asi podes jugar GTA6 hasta el año que viene :(");
    echo $ps5->getDescripcion()."<br>";
    echo $ps5->getPrecio()."<br>";

    echo "<h2>Total de los productos: ".Producto::totalProductos()."</h2>";
?>