<?php
  interface Calculable{
   public function sumar($a,$b); 
   public function restar($a,$b); 
  }

  class Calculadora implements Calculable{
    
    public function sumar($a, $b){
      return $a+$b;
    }

    public function restar($a, $b){
      return $a-$b;
    }
  }

  class CalculadoraCientifica extends Calculadora{
    public function sumar($a, $b){
      return pow($a,$b)+pow($b,$a);
    }
  }

  $calculador=new CalculadoraCientifica();

  echo $calculador->sumar(4,5)."</br>";
  echo $calculador->restar(4,5)."</br>";
?>