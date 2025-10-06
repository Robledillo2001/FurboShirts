<?php
   class FacturaServicio{
    public $monto;
    public $impuestos;

    public function __construct(float $m,float $i){
        $this->monto=$m;
        $this->impuestos=$i;        
    }

    public function getMonto(){
        return $this->monto."€<br>";
    }

    public function getImpuestos(){
        return $this->impuestos."€<br>";
    }

    public function setMonto($m){
        $this->monto=$m; 
    }

    public function setImpuestos($i){
        $this->impuestos=$i;
    }

    public function calcularTotal(){
        return $this->monto+$this->impuestos."€<br>";
    }
   }

   $servicio=new FacturaServicio(1200,500.25);

   echo "MONTO=".$servicio->getMonto();
   echo "IMPUESTOS=".$servicio->getImpuestos();

   echo"TOTAL FACTURA=".$servicio->calcularTotal();
?>
