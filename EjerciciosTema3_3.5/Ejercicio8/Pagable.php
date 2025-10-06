<?php
   Interface Pagable{
    public function procesarPago();
   }
   class Factura implements Pagable{
    private $monto;

    public function __construct($dinero){
        $this->monto=$dinero;
    }

    private function calcularImpuestos(){
        return "Calculando impuestos sobre el monto: " . $this->monto . "<br>";
    }
    public function procesarPago(){
        return $this->calcularImpuestos();
        return "Procesando pago de: " . $this->monto . "<br>";
    }
   }
   $factura = new Factura(1000);
    echo $factura->procesarPago();
?>
