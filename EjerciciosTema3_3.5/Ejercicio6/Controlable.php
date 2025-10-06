<?php
   Interface Controlable{
    public function apagar():void;
   }

   class Electrodmestico{
    public $consumo;

    public function __construct($c){
        $this->consumo=$c;
    }

    protected function mostrarConsumo(){
        return $this->consumo;
    }
   }

   class Television extends Electrodmestico implements Controlable{
    public $boton;
    public function __construct($c){
        $this->boton=true;
        parent::__construct($c);
    }

    public function apagar():void{
        $this->mostrarConsumo();

        if($this->mostrarConsumo()>=450){
            echo "El consumo esta a ".$this->mostrarConsumo()." El tv se apagara ahora<br>";
            $this->boton=false;
        }else{
            echo "Maximo alcance de consumo no alcanzado--->".$this->mostrarConsumo()."<br>";
            $this->boton=true;
        }

        if($this->boton==true){
            echo "Television encendida<br>";
        }else{
            echo "Television apagada<br>";
        }
    }
   }
   $TV=new Television(500);

    $TV->apagar();
?>
