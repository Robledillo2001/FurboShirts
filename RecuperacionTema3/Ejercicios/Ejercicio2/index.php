<?php
interface Transporte {
    public function mover();
}

class Vehiculo {
    private $velocidadMaxima;
    public $velocidad = 0;

    public function __construct($velocidadMaxima) {
        $this->velocidadMaxima = $velocidadMaxima;
    }

    public function acelerar() {
        if ($this->velocidad < $this->velocidadMaxima) {
            $this->velocidad += 5;
        }
    }
}

class Coche extends Vehiculo implements Transporte {
    public function mover() {
        if ($this->velocidad > 0) {
            return "El coche se está moviendo a una velocidad de " . $this->velocidad . " km/h.<br>";
        } else {
            return "El coche está detenido.<br>";
        }
    }
}

// Crear objeto coche con velocidad máxima de 250 km/h
$coche = new Coche(250);

echo $coche->mover(); // El coche está detenido
$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
echo $coche->mover(); // El coche se está moviendo a 1 km/h
?>
