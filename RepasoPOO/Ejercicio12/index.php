<?php
class Vehiculo {
    protected int $velocidadMaxima;
    protected int $velocidad;

    public function __construct(int $vel) {
        $this->velocidad = 0;
        $this->velocidadMaxima = $vel;
    }

    protected function acelerar($cantidad) {
        if ($this->velocidad >= $this->velocidadMaxima) {
            echo "El vehículo ya alcanzó la velocidad máxima.\n";
        } else {
            $this->velocidad += $cantidad;
            if ($this->velocidad > $this->velocidadMaxima) {
                $this->velocidad = $this->velocidadMaxima;
            }
        }
    }

    protected function frenar($cantidad) {
        if ($this->velocidad <= 0) {
            echo "El vehículo ya está detenido.\n";
        } else {
            $this->velocidad -= $cantidad;
            if ($this->velocidad < 0) {
                $this->velocidad = 0;
            }
        }
    }
}

class Auto extends Vehiculo {
    public function manejar($aceleracion, $frenado) {
        $this->acelerar($aceleracion);
        $this->frenar($frenado);
    }

    public function mostrarVelocidad() {
        return "Velocidad del coche es de " . $this->velocidad . " km/h\n";
    }
}

// Prueba
$coche = new Auto(250);
$coche->manejar(120, 60);
echo $coche->mostrarVelocidad();  // Velocidad del coche es de 60 km/h
?>
