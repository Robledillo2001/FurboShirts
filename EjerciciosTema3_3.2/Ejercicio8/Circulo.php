<?php
   class Circulo{
    public $radio;

    public function __construct(float $r){
        $this->radio=$r;
    }

    public function getRadio(){
        return $this->radio."<br>";
    }

    public function setRadio($r){
        $this->radio=$r;
    }


    public function calcualarArea(){
        return pi()*pow($this->radio,2)."<br>";
    }
   }
   $circulo=new Circulo(5);

   echo "Radio=".$circulo->getRadio();

   echo "Area total=".$circulo->calcualarArea();
?>
