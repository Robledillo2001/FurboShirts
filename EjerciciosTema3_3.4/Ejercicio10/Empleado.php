<?php
class Empleado {
    public string $nombre;
    protected float $sueldo;

    public function __construct(string $n, float $s) {
        $this->nombre = $n;
        $this->sueldo = $s;
    }

    // Método protegido para calcular los impuestos en la clase Empleado
    protected function calcularImpuestos(float $porcentaje) {
        $porcentaje /= 100;
        $parteSalario = $this->sueldo * $porcentaje;
        return $parteSalario;
    }

    // Método público para obtener el sueldo (opcional, para más accesibilidad)
    public function obtenerSueldo() {
        return $this->sueldo;
    }
}

class Gerente extends Empleado {

    // Constructor de la clase Gerente
    public function __construct(string $n, float $s) {
        parent::__construct($n, $s);
    }

    // Sobrescribir el método calcularImpuestos para un porcentaje mayor
    protected function calcularImpuestos(float $porcentaje) {
        $porcentaje += 5; // Añadimos un 5% extra de impuestos para Gerentes
        return parent::calcularImpuestos($porcentaje);
    }

    // Método público para acceder a los impuestos calculados
    public function mostrarImpuestos() {
        // Definimos el porcentaje base de impuestos para Gerente
        $porcentajeImpuesto = 10; // Ejemplo de 10%
        $impuestos = $this->calcularImpuestos($porcentajeImpuesto);
        return $impuestos;
    }
}

// Crear un objeto de la clase Gerente
$gerente = new Gerente("Carlos", 5000);

// Mostrar los impuestos calculados
echo "Impuestos calculados para el gerente " . $gerente->nombre . ": " . $gerente->mostrarImpuestos();
?>