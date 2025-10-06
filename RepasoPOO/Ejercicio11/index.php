<?php
   class Empleado{
    public string $nombre;
    public float $salario;

    public function __construct($n,$s){
        $this->nombre=$n;
        $this->salario=$s;
    }
   }

   class Gerente extends Empleado{
    public string $departamento;
    public function __construct($n,$s,$d){
        parent::__construct($n,$s);
        $this->departamento=$d;
    }
   }
?>