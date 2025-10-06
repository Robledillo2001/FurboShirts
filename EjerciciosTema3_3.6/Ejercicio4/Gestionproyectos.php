<?php
// Clase abstracta Proyecto
abstract class Proyecto {
    protected float $presupuesto;

    public function __construct(float $presupuesto) {
        $this->presupuesto = $presupuesto;
    }

    // Método abstracto para calcular la duración
    abstract public function calcularDuracion(): float;
}

// Subclase ProyectoConstruccion
class ProyectoConstruccion extends Proyecto {
    private float $costoDiario = 500; // Supongamos que el costo diario es fijo para construcción

    public function __construct(float $presupuesto) {
        parent::__construct($presupuesto);
    }

    // Calcula la duración en días para un proyecto de construcción
    public function calcularDuracion(): float {
        return $this->presupuesto / $this->costoDiario;
    }
}

// Subclase ProyectoSoftware
class ProyectoSoftware extends Proyecto {
    private float $costoPorHora = 50; // Supongamos que el costo por hora es fijo para desarrollo de software
    private int $horasDiarias = 8; // Supongamos una jornada de 8 horas diarias

    public function __construct(float $presupuesto) {
        parent::__construct($presupuesto);
    }

    // Calcula la duración en días para un proyecto de software
    public function calcularDuracion(): float {
        $costoDiario = $this->costoPorHora * $this->horasDiarias;
        return $this->presupuesto / $costoDiario;
    }
}

// Aplicación para calcular la duración de proyectos
function mostrarDuracionProyecto(Proyecto $proyecto, string $tipoProyecto) {
    echo "Duración estimada para el $tipoProyecto: " . $proyecto->calcularDuracion() . " días<br>";
}

// Ejemplos de uso
$proyectoConstruccion = new ProyectoConstruccion(100000);
$proyectoSoftware = new ProyectoSoftware(30000);

mostrarDuracionProyecto($proyectoConstruccion, "Proyecto de Construcción");
mostrarDuracionProyecto($proyectoSoftware, "Proyecto de Software");

?>
