<?php
class Tienda {
    public $productos = [];

    public function __construct(string $n, int $c) {
        $this->productos[] = [
            "Nombre" => $n,
            "Cantidad" => $c
        ];
    }

    public function mostrarInventario() {
        echo "Inventario Tienda<br>";
        foreach ($this->productos as $producto) {
            echo "- " . $producto["Nombre"] . " (Cantidad: " . $producto["Cantidad"] . ")<br>";
        }
    }
}

class TiendaElectronica extends Tienda {
    public function mostrarInventario() {
        echo "Inventario de productos electrónicos:<br>";
        foreach ($this->productos as $producto) {
            // Verificamos si el nombre del producto contiene la palabra "Electrónica"
            if (strpos($producto["Nombre"], "Electrónica") !== false) {
                echo "- " . $producto["Nombre"] . " (Cantidad: " . $producto["Cantidad"] . ")<br>";
            }
        }
    }
}

$tiendaElectronica = new TiendaElectronica("Microondas Electrónica", 45);
$tiendaElectronica->mostrarInventario();
?>
