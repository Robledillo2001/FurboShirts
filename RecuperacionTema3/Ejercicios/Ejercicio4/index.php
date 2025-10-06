<?php
    abstract class Empleado{
        public string $nombre;
        public float $sueldoBase;

        public function __construct($n,$sb){
            $this->nombre=$n;
            $this->sueldoBase=$sb;
        }

        abstract public function calcularSalario();

        public function mostrarSueldo(){
            return $this->sueldoBase;
        }
    }

    class EmpleadoTiempoCompleto extends Empleado{
        public function calcularSalario(){
            $this->sueldoBase*=3;
        }
    }

    class EmpleadoPorHora extends Empleado{
        public function calcularSalario(){
            $this->sueldoBase*=2;
        }
    }
    $emp1=new EmpleadoTiempoCompleto("Julian",2000);
    $emp2=new EmpleadoPorHora("Kilyan",2000);

    $emp1->calcularSalario();
    echo "Salario:".$emp1->mostrarSueldo();

    $emp2->calcularSalario();
    echo "Salario:".$emp2->mostrarSueldo();
?>
