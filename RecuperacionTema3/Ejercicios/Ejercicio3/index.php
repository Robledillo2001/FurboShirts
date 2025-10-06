<?php
interface Controlable {
    public function apagar();
}

class Electrodomestico {
    protected float $consumo; // Cambiado a protected para permitir acceso en la subclase

    public function __construct(float $consumo) {
        $this->consumo = $consumo; // Se inicializa el consumo en el constructor
    }

    protected function mostrarConsumo() {
        return "Consumo TV: " . $this->consumo . "W";
    }

    // Método público para obtener el consumo
    public function obtenerConsumo() {
        return $this->mostrarConsumo();
    }
}

class Televisor extends Electrodomestico implements Controlable {
    public function apagar() {
        if ($this->consumo > 170) {
            $this->consumo = 0;
            return "TV apagada por alto consumo.<br>";
        } else {
            return "TV ya está en consumo bajo.<br>";
        }
    }
}

// Crear un objeto Televisor con un consumo de 180W
$miTV = new Televisor(180);

// Apagar la TV
echo $miTV->apagar();

// Mostrar el consumo después de apagarla
echo $miTV->obtenerConsumo();
?>
