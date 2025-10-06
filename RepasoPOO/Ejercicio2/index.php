<?php
abstract class Empleado {
    protected string $nombre;
    protected string $apellidos;
    protected string $dni;
    protected float $sueldo;
    protected int $idEmp;

    protected static int $contador = 0;
    protected static array $empleados = [];

    public function __construct($nombre, $apellidos, $dni, $sueldo) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->sueldo = $sueldo;

        self::$contador++;
        $this->idEmp = self::$contador;

        self::$empleados[] = $this; // Guardamos el objeto en una lista global
    }

    abstract public function obtenerSueldo(): float;

    public function mostrarFila(): string {
        return "<tr>
                    <td>{$this->idEmp}</td>
                    <td>{$this->nombre}</td>
                    <td>{$this->apellidos}</td>
                    <td>{$this->dni}</td>
                    <td>" . number_format($this->obtenerSueldo(), 2) . " €</td>
                    <td>" . static::class . "</td>
                </tr>";
    }

    public static function mostrarTabla() {
        echo "<table border='1' cellpadding='5' cellspacing='0'>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Apellidos</th><th>DNI</th><th>Sueldo</th><th>Tipo</th>
                </tr>";
        foreach (self::$empleados as $empleado) {
            echo $empleado->mostrarFila();
        }
        echo "</table>";
        echo "<p>Total empleados: " . self::$contador . "</p>";
    }
}

class Trabajador extends Empleado {
    public function obtenerSueldo(): float {
        return $this->sueldo;
    }
}

class Directivo extends Empleado {
    public function obtenerSueldo(): float {
        return $this->sueldo * 1.25;
    }
}

class Encargado extends Empleado {
    public function obtenerSueldo(): float {
        return $this->sueldo + 300;
    }
}

// Crear 6 empleados mezclando tipos
new Trabajador("Luis", "Ramírez", "12345678A", 1200);
new Directivo("Ana", "Torres", "23456789B", 2000);
new Encargado("Pedro", "López", "34567890C", 1500);
new Trabajador("Marta", "Sánchez", "45678901D", 1100);
new Encargado("Lucía", "Martínez", "56789012E", 1600);
new Directivo("Carlos", "Ruiz", "67890123F", 2500);

// Mostrar la tabla y total
Empleado::mostrarTabla();
?>
