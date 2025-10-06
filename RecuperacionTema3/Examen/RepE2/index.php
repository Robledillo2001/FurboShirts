<?php
    abstract class Empleado{
        public $nombre;
        public $apellidos;
        public $dni;
        public $sueldo;
        public static $empleados=0;
        public $id;

        public function __construct(string $nombre,string $apellidos,string $dni,float $sueldo){
            $this->nombre=$nombre;
            $this->apellidos=$apellidos;
            $this->dni=$dni;
            $this->sueldo=$sueldo;
            self::$empleados+=1;
            $this->id=self::$empleados;
        }

        abstract public function calcularSalario();
    }

    class Directivo extends Empleado{
        public $bonus;
        public function __construct(string $nombre,string $apellidos,string $dni,float $sueldo){
            parent::__construct($nombre,$apellidos,$dni,$sueldo);
            $this->bonus=0.25;
        }

        public function calcularSalario(){
            $resultado=$this->sueldo*$this->bonus;
            $this->sueldo+=$resultado;
            return $this->sueldo;
        }
    }

    class Encargado extends Empleado{
        public $bonus;
        public function __construct(string $nombre,string $apellidos,string $dni,float $sueldo){
            parent::__construct($nombre,$apellidos,$dni,$sueldo);           
            $this->bonus=300;
        }

        public function calcularSalario(){
            $this->sueldo+=$this->bonus;
            return $this->sueldo;
        }
    }

    class Trabajador extends Empleado{
        public $bonus;
        public function __construct(string $nombre,string $apellidos,string $dni,float $sueldo){
            parent::__construct($nombre,$apellidos,$dni,$sueldo);
        }

        public function calcularSalario(){
            return $this->sueldo;
        }
    }

    // Crear empleados
    $empleado1 = new Directivo("Juan", "Pérez", "12345678A", 5000);
    $empleado2 = new Directivo("Ana", "Martínez", "23456789B", 6000);
    $empleado3 = new Encargado("Carlos", "Gómez", "34567890C", 2500);
    $empleado4 = new Encargado("María", "López", "45678901D", 2800);
    $empleado5 = new Trabajador("Luis", "Hernández", "56789012E", 1500);
    $empleado6 = new Trabajador("Laura", "Fernández", "67890123F", 1600);

    // Mostrar los salarios calculados
    echo "Salarios calculados de los empleados: <br>";

    echo "Número total de empleados en la empresa: " . Empleado::$empleados . "<br>";

    echo "Empleado {$empleado1->id}: " . $empleado1->nombre . " " . $empleado1->apellidos . ", Salario: " . $empleado1->calcularSalario() . "€<br>";
    echo "Empleado {$empleado2->id}: " . $empleado2->nombre . " " . $empleado2->apellidos . ", Salario: " . $empleado2->calcularSalario() . "€<br>";
    echo "Empleado {$empleado3->id}: " . $empleado3->nombre . " " . $empleado3->apellidos . ", Salario: " . $empleado3->calcularSalario() . "€<br>";
    echo "Empleado {$empleado4->id}: " . $empleado4->nombre . " " . $empleado4->apellidos . ", Salario: " . $empleado4->calcularSalario() . "€<br>";
    echo "Empleado {$empleado5->id}: " . $empleado5->nombre . " " . $empleado5->apellidos . ", Salario: " . $empleado5->calcularSalario() . "€<br>";
    echo "Empleado {$empleado6->id}: " . $empleado6->nombre . " " . $empleado6->apellidos . ", Salario: " . $empleado6->calcularSalario() . "€<br>";
?>