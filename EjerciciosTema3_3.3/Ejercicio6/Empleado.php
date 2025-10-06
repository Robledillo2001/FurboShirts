<?php
   class Empleado{
    public $salario;

    public function __construct($s){
        $this->salario=$s;
    }

    public function setSalario($s){
        $this->salario=$s;
    }

    public function getSalario(){
        return $this->salario."<br>";
    }
   }
   class Gerente extends Empleado{
    public function __construct($s){
        parent::__construct($s);
    }

    public function calcularBono(){
        $this->salario+=$this->salario*0.1;
        return $this->salario."<br>";
    }
   }
   class Director extends Empleado{
    public function __construct($s){
        parent::__construct($s);
    }

    public function calcularBono(){
        $this->salario+=$this->salario*0.2;
        return $this->salario."<br>";
    }
   }
   $director=new Director(4500);
   $gerente=new Gerente(1850);

   echo $gerente->calcularBono();
   echo $director->calcularBono();
?>
