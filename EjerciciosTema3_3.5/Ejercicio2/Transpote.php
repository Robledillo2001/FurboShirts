<?php
interface Transporte {
    public function mover($vel): void;
}

class Vehiculo {
    public string $marca;
    public string $modelo;
    private int $velocidad;

    public function __construct($mod, $mar, int $vel) {
        $this->marca = $mar;
        $this->modelo = $mod;
        $this->velocidad = $vel;
    }

    protected function acelerar(int $aceleracion): void {
        $this->velocidad += $aceleracion;
    }

    // Método para obtener la velocidad actual
    public function obtenerVelocidad(): int {
        return $this->velocidad;
    }
}

class Coche extends Vehiculo implements Transporte {
    public function __construct($mod, $mar, int $vel) {
        parent::__construct($mod, $mar, $vel);
    }

    public function mover($vel): void {
        // Usamos el método acelerar con el valor de velocidad proporcionado
        $this->acelerar($vel);
        // Mostramos la velocidad actual usando el método obtenerVelocidad()
        echo "El coche está ahora a " . $this->obtenerVelocidad() . " km/h.<br>";
    }
}

// Crear un objeto de la clase Coche
$coche = new Coche("Supra", "Toyota", 230);
$coche->mover(75);
?>
