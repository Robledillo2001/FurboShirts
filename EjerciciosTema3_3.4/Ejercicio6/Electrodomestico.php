<?php
  class Electrodomestico{
    public string $marca;
    public float $precio;

    public function __construct(string $m,float $p) {
      $this->marca = $m;
      $this->precio = $p;
    }
    protected function calcularDescuento(){
      $porcentaje=$this->precio*0.10;
      $this->precio-=$porcentaje;
      return $this->precio;
    }
  }
  class Lavadora extends Electrodomestico{
    public function __construct(string $m,float $p){
      parent::__construct($m,$p);
    }
    protected function calcularDescuento(){
      $porcentaje=$this->precio*0.20;
      $this->precio-=$porcentaje;
      return $this->precio;
    }
    public function llamarMetodos(){
      return $this->calcularDescuento();
    }
  }
  $lavadora=new Lavadora("SIEMEMS",800);

  echo $lavadora->llamarMetodos();
?>
