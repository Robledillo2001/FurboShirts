<?php
    class Producto{
        public string $nombre;
        public float $precio;
        public int $cantidad;

        // Constructor para inicializar el producto con nombre, precio y cantidad
        public function __construct($n,$p,$c=1){
            $this->nombre=$n;
            $this->precio=$p;
            $this->cantidad=$c;
        }
    }

    class Carrito{
        public $productos=[]; // Array que guardará los objetos Producto

        // Método para agregar un producto al carrito
        public function agregarProductos($producto){
            $this->productos[]=$producto;
        }

        // Método protegido que calcula el total del carrito sumando precio * cantidad de cada producto
        protected function calcularTotal(){
            $total=0;
            foreach($this->productos as $producto){
                $total+=($producto->precio*$producto->cantidad);
            }
            return $total;
        }

        // Método protegido para mostrar una fila HTML con los datos del producto
        protected function mostrarProductos($producto){
            return "<tr>
                        <td>".$producto->nombre."</td>
                        <td>".$producto->precio."$</td>
                        <td>".$producto->cantidad."</td>
                    </tr>";
        }

        // Método público que muestra la tabla completa con todos los productos y el total
        public function mostrarResumen(){
            echo "<table border='1'>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>";
            foreach($this->productos as $producto){
                echo $this->mostrarProductos($producto);
            }
            echo "<tr>
                    <td colspan='3'>Precio total del Carrito es de ".$this->calcularTotal()."$</td>
                </tr>
            </table>";
        }
    }

    class Cliente{
        public Carrito $carrito;

        // Constructor recibe un objeto Carrito para asignarlo al cliente
        public function __construct(Carrito $car){
            $this->carrito=$car;
        }
    }

    // Iniciamos sesión para mantener el carrito entre recargas
    session_start();

    // Si ya existe carrito guardado en sesión, lo recuperamos (deserializamos)
    if(isset($_SESSION['carrito'])){
        $carrito=unserialize(($_SESSION['carrito'])); // Convertimos la cadena de sesión a objeto Carrito
    }else{
        // Si no existe carrito en sesión, creamos uno nuevo con Cliente y Carrito
        $cliente=new Cliente(new Carrito);
        $carrito=$cliente->carrito;
    }

    // Si se envió el formulario con datos de producto
    if(isset($_POST['nombre'],$_POST['precio'],$_POST['cantidad'])){
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $cantidad=$_POST['cantidad'];

        // Validamos que los datos sean válidos
        if($nombre!=''&&$precio>0&&$cantidad>0){
            // Creamos nuevo producto con los datos recibidos
            $producto=new Producto($nombre,$precio,$cantidad);
            // Lo agregamos al carrito
            $carrito->agregarProductos($producto);

            // Guardamos el carrito actualizado serializado en la sesión
            $_SESSION['carrito']=serialize($carrito);
        }
    }
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Carrito de Compras</title>
    </head>
    <body>
        <h2>Agregar Producto al Carrito</h2>
        <form method="POST" action="">
            <label>Nombre:</label><br />
            <input type="text" name="nombre" required /><br /><br />

            <label>Precio:</label><br />
            <input type="number" step="0.01" name="precio" required min="0.01" /><br /><br />

            <label>Cantidad:</label><br />
            <input type="number" name="cantidad" required min="1" value="1" /><br /><br />

            <button type="submit">Agregar al carrito</button>
        </form>

        <h2>Resumen del carrito</h2>
        <!-- Mostramos el resumen del carrito con la tabla -->
        <?=$carrito->mostrarResumen();?>
    </body>
</html>
