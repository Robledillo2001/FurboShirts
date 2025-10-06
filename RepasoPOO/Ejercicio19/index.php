<?php
    interface EmpleadoInterface{
        public function calcularSalario($bonus);
    }

    class Empleado implements EmpleadoInterface{
        public string $nombre;
        public float $sueldoBase;
        public function __construct(string $n,float $s){
            $this->nombre=$n;
            $this->sueldoBase=$s;
        }

        public function calcularSalario($bonus){
            $bonus=$bonus/100;
            $this->sueldoBase=$this->sueldoBase * (1 + $bonus);
            return $this->sueldoBase;
        }
    }

    class EmpleadoGerente extends Empleado{
        public function calcularSalario($bonus){
            $bonus=$bonus/100;
            $this->sueldoBase=$this->sueldoBase * (1 + $bonus+0.01);
            return $this->sueldoBase;
        }
    }

    $empleado=new EmpleadoGerente("Ruben",1200);

    echo "Salario total del empleado es de: ".number_format($empleado->calcularSalario(5),2)."€";
?>