<?php
    class Tienda{
        public static float $descuentoGeneral=0.0;

        public static function actualizarDescuento(int $descuento){
            $descuentoVerdadero=$descuento/100;
            self::$descuentoGeneral=$descuentoVerdadero;
        }
    }
    class Producto{
        public string $nombre;
        public float $precio;

        public function __construct(string $nombre, float $precio) {
            $this->nombre = $nombre;
            $this->precio = $precio;
        }
        public function calcularPrecioFinal(){
            $descuento=$this->precio*(Tienda::$descuentoGeneral);
            return $this->precio-$descuento;
        }
    }
    // Incluimos las clases Tienda y Producto
    
    // Actualizamos el descuento general de la tienda al 20%
    Tienda::actualizarDescuento(20); // 20% de descuento

    // Creamos productos con precios específicos
    $producto1 = new Producto("Camiseta", 100.0);
    $producto2 = new Producto("Pantalones", 200.0);

    // Mostramos el precio final de cada producto después de aplicar el descuento
    echo "Precio final de {$producto1->nombre}: $" . $producto1->calcularPrecioFinal() . "<br>";
    echo "Precio final de {$producto2->nombre}: $" . $producto2->calcularPrecioFinal() . "<br>";
?>
