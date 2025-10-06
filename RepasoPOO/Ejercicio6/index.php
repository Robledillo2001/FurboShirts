<?php
interface ProductoDescuento {
    public function calcularPrecioFinal();
}

class Producto implements ProductoDescuento {
    public string $nombre;
    public float $precio;
    public string $codigo;
    private int $id;
    public static int $contador = 0;
    public static array $productos = [];

    public function __construct($nombre, $precio, $codigo) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->codigo = $codigo;
        self::$contador++;
        $this->id = self::$contador;
        self::$productos[] = $this;
    }

    public function mostrarFila() {
        return "<tr>
                    <td>{$this->id}</td>
                    <td>{$this->nombre}</td>
                    <td>{$this->precio}</td>
                    <td>{$this->codigo}</td>
                    <td>{$this->calcularPrecioFinal()}</td>
                </tr>";
    }

    public static function mostrarTabla() {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CODIGO</th>
                    <th>PRECIO FINAL</th>
                </tr>";
        foreach (self::$productos as $producto) {
            echo $producto->mostrarFila();
        }
        echo "</table>";
    }

    public function calcularPrecioFinal() {
        return $this->precio;
    }
}

class ProductoGeneral extends Producto {
    public function calcularPrecioFinal() {
        if ($this->precio >= 100) {
            return $this->precio - ($this->precio * 0.10);
        }
        return $this->precio;
    }
}

class ProductoAlimenticio extends Producto {
    public function calcularPrecioFinal() {
        return $this->precio + ($this->precio * 0.04); // 4% IVA
    }
}

class ProductoElectronico extends Producto {
    public function calcularPrecioFinal() {
        $descuento = $this->precio * 0.15;
        $precioDescontado = $this->precio - $descuento;
        return $precioDescontado + ($precioDescontado * 0.21); // 21% IVA
    }
}

// Pruebas
new ProductoGeneral("Mesa", 150, "GEN001");
new ProductoAlimenticio("Leche", 1.50, "ALI001");
new ProductoElectronico("Portátil", 1200, "ELE001");
new ProductoGeneral("Lámpara", 80, "GEN002");

Producto::mostrarTabla();
echo "<h1>Total Productos: " . Producto::$contador . "</h1>";
?>
