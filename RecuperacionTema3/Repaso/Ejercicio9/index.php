<?php
abstract class Producto {
    protected $nombre;  // Cambié la visibilidad a protected
    protected $precio;  // Cambié la visibilidad a protected

    // Constructor
    public function __construct(string $nombre, float $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    // Método abstracto para calcular el descuento
    abstract public function calcularDescuento(): float;

    // Método para obtener el nombre del producto
    public function getNombre(): string {
        return $this->nombre;
    }

    // Método para obtener el precio original
    public function getPrecio(): float {
        return $this->precio;
    }
}

// Subclase ProductoElectronico
class ProductoElectronico extends Producto {
    // Constructor
    public function __construct(string $n, float $p) {
        parent::__construct($n, $p);
    }

    // Implementación del cálculo de descuento para productos electrónicos
    public function calcularDescuento(): float {
        return $this->precio * 0.8;  // 20% de descuento
    }
}

// Subclase ProductoRopa
class ProductoRopa extends Producto {
    // Constructor
    public function __construct(string $n, float $p) {
        parent::__construct($n, $p);
    }

    // Implementación del cálculo de descuento para productos de ropa
    public function calcularDescuento(): float {
        return $this->precio * 0.65;  // 35% de descuento
    }
}

// Ejemplo de uso
$productoElectronico = new ProductoElectronico("Smartphone", 1000);
$productoRopa = new ProductoRopa("Camiseta", 50);

// Mostrar los precios con descuento
echo "Producto: " . $productoElectronico->getNombre() . ", Precio original: " . $productoElectronico->getPrecio() . ", Precio con descuento: " . $productoElectronico->calcularDescuento() . "<br>";
echo "Producto: " . $productoRopa->getNombre() . ", Precio original: " . $productoRopa->getPrecio() . ", Precio con descuento: " . $productoRopa->calcularDescuento() . "<br>";
?>
