<?php
    abstract class Empleado{
        public $nombre;
        public $sueldoBase;

        public function __construct(string $n,float $s){
            $this->nombre=$n;
            $this->sueldoBase=$s;
        }

        abstract public function calcularSalario();
    }

    class EmpleadoTiempoCompleto extends Empleado{
        public function __construct(String $n,float $s){
            parent::__construct($n,$s);
        }

        public function calcularSalario(){
            $this->sueldoBase+=$this->sueldoBase*0.75;
            return $this->sueldoBase."€";
        }
    }

    class EmpleadoPorHora extends Empleado{
        public function __construct(String $n,float $s){
            parent::__construct($n,$s);
        }

        public function calcularSalario(){
            $this->sueldoBase+=$this->sueldoBase*0.10;
            return $this->sueldoBase."€";
        }
    }

    $empleado1 = new EmpleadoTiempoCompleto("Juan Pérez", 3000, 500);
$empleado2 = new EmpleadoPorHora("Ana García", 15, 160);

// Mostrar información y salarios
echo "Salario Total de :".$empleado1->nombre." " . $empleado1->calcularSalario() . "\n";
echo"Salario Total de :".$empleado2->nombre." " . $empleado2->calcularSalario() . "\n";
?>
