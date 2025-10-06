<?php
   Interface Empleadointerface{
    public function calcularSalario($p);
   }
   class Empleado{
    public $nombre;
    public float $sueldoBase;

    public function __construct($n,float $sB){
        $this->nombre=$n;
        $this->sueldoBase=$sB;
    }
   }

   class EmpleadoGerente extends Empleado implements Empleadointerface{
    public function __construct($n,float $sB){
        parent::__construct($n,$sB);
    }

    public function calcularSalario($porcentaje){
        $porcentaje/=100;
        $totalPorcentaje=$this->sueldoBase*$porcentaje;
        $this->sueldoBase+=$totalPorcentaje;
        return $this->sueldoBase;
    }
   }
   $gerente=new EmpleadoGerente("Antony",4000);

   echo $gerente->calcularSalario(30);
?>
