<?php
session_start();

class Almacen {
    public static $productosTotales = 0;
    public static $productos = [];

    public $nombre;
    public $precio;
    public $id;

    // Constructor: asigna nombre, precio e ID al producto
    public function __construct($n, $p) {
        $this->nombre = $n;
        $this->precio = $p;

        // Solo asignar ID si aún no está definido (cuando se crea por primera vez)
        if (!isset($this->id)) {
            self::$productosTotales++;
            $this->id = self::$productosTotales;
        }

        self::$productos[] = $this;
    }

    // Cargar productos desde sesión
    public static function cargarAlmacen() {
        if (isset($_SESSION['Almacen'])) {
            self::$productos = unserialize($_SESSION['Almacen']);
            self::$productosTotales = count(self::$productos);

            // Asignar ID secuencial si faltan
            foreach (self::$productos as $i => $producto) {
                if (!isset($producto->id)) {
                    $producto->id = $i + 1;
                }
            }
        }
    }

    // Guardar productos en sesión (serializados)
    public static function guardarProducto() {
        $_SESSION['Almacen'] = serialize(self::$productos);
        self::$productosTotales = count(self::$productos);
    }

    // Mostrar una fila de producto
    protected function mostrarDatos() {
        return "<tr>
                    <td>{$this->id}</td>
                    <td>{$this->nombre}</td>
                    <td>{$this->precio}€</td>
                </tr>";
    }

    // Mostrar la tabla de productos
    public static function mostrarProductos() {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                </tr>";
        foreach (self::$productos as $producto) {
            echo $producto->mostrarDatos();
        }
        echo "<tr>
                <td colspan='3'>Total: " . self::$productosTotales . "</td>
              </tr>
              </table>";
    }
}

class ProductoElectronico extends Almacen {
    public function __construct($n, $p) {
        parent::__construct($n, $p);
    }
}

class ProductoRopa extends Almacen {
    public function __construct($n, $p) {
        parent::__construct($n, $p);
    }
}

// Si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];

    Almacen::cargarAlmacen();

    if ($tipo === "Ropa") {
        $producto = new ProductoRopa($nombre, $precio);
    } else {
        $producto = new ProductoElectronico($nombre, $precio);
    }

    Almacen::guardarProducto();
} else {
    // Mostrar productos si no se envió nada, para mantener los datos
    Almacen::cargarAlmacen();
}
?>

<!-- FORMULARIO HTML -->
<form method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required><br>
    <label for="precio">Precio</label>
    <input type="number" name="precio" step="0.01" required><br>
    <label for="tipo">Tipo</label>
    <select name="tipo">
        <option value="Ropa">Ropa</option>
        <option value="Electronico">Electrónico</option>
    </select>
    <button type="submit">Añadir Producto al Almacén</button>
</form>

<h2>Productos en Almacén</h2>
<?php Almacen::mostrarProductos();?>
