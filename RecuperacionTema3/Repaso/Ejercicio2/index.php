<?php
interface Transporte {
    public function mover();
}

class Vehiculo {
    private int $velocidad;

    public function __construct() {
        $this->velocidad = 0;
    }

    protected function acelerar() {
        $this->velocidad += 10;
        echo "Acelerando. Velocidad actual: $this->velocidad km/h\n";
    }

    protected function obtenerVelocidad(): int {
        return $this->velocidad;
    }
}

class Coche extends Vehiculo implements Transporte {
    public function __construct() {
        parent::__construct(); // Llama al constructor de la clase base
    }

    public function mover() {
        // Implementamos el método de la interfaz
        $this->acelerar(); // Usa el método protegido de Vehiculo
        echo "El coche se está moviendo a una velocidad de " . $this->obtenerVelocidad() . " km/h.\n";
    }
}

// Prueba
$coche = new Coche();
$coche->mover();
?>
