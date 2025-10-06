<?php
    interface Controlable{
      public function apagar();
    }

    class Electrodomestico {
        private float $consumo;
        protected bool $boton;

        public  function __construct(float $c,$boton=true) {
          $this->consumo=$c;
          $this->boton=$boton;
        }

        public function mostrarConsumo(){
          return "El consumo es de ".$this->consumo;
        }
    }

    class Televisor extends Electrodomestico implements Controlable{


      public function __construct(float $c,$boton=true) {
        parent::__construct($c,$boton);
      }

      public function apagar():string{
        $this->boton=false;
        return "TV apagada";
      }
    }

    $TV=new Televisor(1200);

    echo $TV->mostrarConsumo();
    echo "<br>";
    echo $TV->apagar();
?>