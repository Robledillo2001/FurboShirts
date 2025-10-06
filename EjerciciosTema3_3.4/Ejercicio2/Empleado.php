<?php
    class Empleado{
        private float $salario;

        public function __construct(float $s){
            $this->salario=$s;
        }

        private function calcularBono(){
            $bono=$this->salario*0.10;
            return $bono+$this->salario;
        }

        public function mostrarSalarioConBono(){
            return $this->calcularBono();
        }
    }
    $empleado=new Empleado(1200);

    echo "Salario=".$empleado->mostrarSalarioConBono()."<br>";
?>
