<?php
   Interface Volable{
    public function volar():void;
   }

   class VehiculoAereo{
    protected float $alturaMaxima;
    
    public function __construct(float $aM){
        $this->alturaMaxima=$aM;
    }

    public function getAlturaM(){
        return $this->alturaMaxima;
    }

    public function setAlturaM(float $aM){
        $this->alturaMaxima=$aM;
    }
   }
   class Helicoptero extends VehiculoAereo implements Volable{
    public function __construct(float $aM){
        parent::__construct($aM);
    }

    public function volar():void{
        echo "El helicoptero alcaza una altura maxima de ".$this->alturaMaxima;
    }
   }
   $helicoptero=new Helicoptero(400.50);
   $helicoptero->volar();
?>
