<?php
    class Tienda{
        static $descuentoGeneral=0.25;

        public static function actualizarDescuento(float $nD){
            self::$descuentoGeneral=$nD;
        }
    }

    class Producto{
        public $precio;

        public function __construct(float $p){
            $this->precio=$p;
        }

        public function aplicarDescuento(){
            $this->precio*=Tienda::$descuentoGeneral;
            return "Precio actualizado a ".$this->precio."€";
        }
    }
    Tienda::actualizarDescuento(0.10);
    $producto=new Producto(1200);
    echo $producto->aplicarDescuento();
?>
