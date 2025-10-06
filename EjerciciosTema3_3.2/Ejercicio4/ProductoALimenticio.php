<?php
    class ProductoAlimenticio{
        public $nombre;
        public $fechaCad;

        public function __construct(string $n,$Caducidad)
        {
            $this->nombre=$n;
            $this->fechaCad=new DateTime($Caducidad);
        }

        public function getNombre(){
            return $this->nombre."<br>";
        }

        public function setNombre(string $n){
            $this->nombre=$n;
        }


        public function getCaducidad(){
            return $this->fechaCad->format('Y-m-d') . "<br>";
        }

        public function setCaducidad(int $c){
            $this->fechaCad=new DateTime($c);
        }

        public function estaCaducado(string $c){
            $c=new DateTime($c);
            if($this->fechaCad==$c||$this->fechaCad>$c){
                return "El producto esta en optimas condiciones<br>";
            }else{
                return "El producto caduco<br>";
            }
        }
    }

    $Producto=new ProductoAlimenticio("Chele",2024-10-11);

    echo $Producto->getNombre();
    echo $Producto->getCaducidad();

    echo $Producto->estaCaducado(2024-10-02);
?>
