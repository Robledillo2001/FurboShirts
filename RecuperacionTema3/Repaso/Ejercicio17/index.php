<?php
    abstract class Mantenimiento{
        public $operario;
        public $duracion;

        public function __construct(string $op,int $tiempo){
            $this->operario=$op;
            $this->duracion=$tiempo;
        }


         public function getOPerario(){
            return $this->operario;
         }

         public function setOperario(string $op){
            $this->operario=$op;
         }

         public function getDuracion(){
            return $this->duracion;
         }

         public function setDuracion(int $duracion){
            $this->duracion=$duracion;
         }
    }

    class Limpieza extends Mantenimiento{
        public $productos=[];
        public function __construct(string $op,int $tiempo){
            parent::__construct($op,$tiempo);
        }

        public function insertarProducto($producto){
            $this->productos[]=$producto;
        }

        public function getProductos(): array {
            $productos = [];
            foreach ($this->productos as $producto) {
                $productos[] = strtoupper($producto);
            }
            return $productos;
        }
        
    }

    class Reparacion extends Mantenimiento{
        public $piezas=[];
        public function __construct(string $op,int $tiempo){
            parent::__construct($op,$tiempo);
        }

        public function insertarProducto($pieza){
            $this->piezas[]=$pieza;
        }

        public function getPiezas(): array {
            $piezas = [];
            foreach ($this->piezas as $pieza) {
                $piezas[] = strtoupper($pieza);
            }
            return $piezas;
        }
        
    }

    class Inspeccion extends Mantenimiento{
        public function __construct(string $op,int $tiempo){
            parent::__construct($op,$tiempo);
        }
    }

    // Crear una instancia de Limpieza
    $limpieza = new Limpieza("Ana", 60);
    $limpieza->insertarProducto("detergente");
    $limpieza->insertarProducto("desinfectante");

    echo "Limpieza:\n";
    echo "Operario: " . $limpieza->getOperario() . "\n";
    echo "Duración: " . $limpieza->getDuracion() . " minutos\n";
    echo "Productos utilizados: " . implode(", ", $limpieza->getProductos()) . "\n\n";

    // Crear una instancia de Reparacion
    $reparacion = new Reparacion("Carlos", 90);
    $reparacion->insertarProducto("tornillo");
    $reparacion->insertarProducto("llave inglesa");

    echo "Reparación:\n";
    echo "Operario: " . $reparacion->getOperario() . "\n";
    echo "Duración: " . $reparacion->getDuracion() . " minutos\n";
    echo "Piezas utilizadas: " . implode(", ", $reparacion->getPiezas()) . "\n\n";

    // Crear una instancia de Inspeccion
    $inspeccion = new Inspeccion("Luis", 30);

    echo "Inspección:\n";
    echo "Operario: " . $inspeccion->getOperario() . "\n";
    echo "Duración: " . $inspeccion->getDuracion() . " minutos\n";
?> 