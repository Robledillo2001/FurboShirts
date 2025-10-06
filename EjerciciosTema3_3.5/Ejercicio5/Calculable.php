<?php
   Interface Calculable{
    public function sumar();
    public function restar();
   }

   class Calculadora implements Calculable{
    public $numero1;
    public $numero2;


    public function __construct(int $n1,int $n2){
        $this->numero1=$n1;
        $this->numero2=$n2;
    }

    public function sumar(){
        return $this->numero1+$this->numero2;
    }

    public function restar(){
        return $this->numero1-$this->numero2;
    }
   }
   
   class CalculadoraCientifica extends Calculadora{
    public function __construct(int $n1,int $n2){
       parent::__construct($n1,$n2); 
    }

    public function sumar(){
        return pow($this->numero1+$this->numero2,2);
    }
   }

   $calc = new Calculadora(5, 3);
    echo $calc->sumar()."<br>"; // Salida: 8 (suma normal)
    echo $calc->restar()."<br>"; // Salida: 2 (resta normal)

    $calcCientifica = new CalculadoraCientifica(5, 3);
    echo $calcCientifica->sumar()."<br>"; // Salida: 64 ((5 + 3)^2 = 64)
    echo $calcCientifica->restar()."<br>"; // Salida: 2 (resta normal)
?>
