<?php
   abstract class Empleado{
    protected string $nombre;
    protected float $sueldoBase;

    public function __construct(string $n,float $sB){
        $this->nombre=$n;
        $this->sueldoBase=$sB;
    }

    abstract public function calcularSalario():float;
   }

   class EmpleadoTiempoCompleto extends Empleado{
    public function __construct(string $n,float $sB){
        parent::__construct($n,$sB);
    }

    public function calcularSalario():float{
        return $this->sueldoBase;
    }
   }

   class EmpleadoPorHora extends Empleado{
    private int $horasTrabajadas;
    private float $tarifaPorHora;
    
    public function __construct(string $n,float $sB,int $h,float $t){
        parent::__construct($n,$sB);
        $this->horasTrabajadas=$h;
        $this->tarifaPorHora=$t;
    }

    public function calcularSalario():float{
        $resultado=$this->horasTrabajadas*$this->tarifaPorHora;
        $this->sueldoBase=$resultado;
        return $this->sueldoBase;
    }
   }
   $emple1=new EmpleadoTiempoCompleto("Carlos",1200);
   echo $emple1->calcularSalario()."<br>";

   $emple2=new EmpleadoPorHora("Carlos",1200,160,10.5);
   echo $emple2->calcularSalario()."<br>";
?>
