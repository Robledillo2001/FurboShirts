<?php
    class Vehiculo{
        private $marca;
        

        public function __construct(string $m) {
            $this->marca = $m;
        }

        public function getMarca(){
            if(empty($this->marca)){
                return "La marca del vehiculo esta vacia";
            }else{
                return "La marca del vehiculo es ".$this->marca;
            }
        }

        public function setMarca(string $m){
            if(empty($m)){
                $this->marca=$this->marca;
            }else{
                $this->marca=$m;
            }
        }
    }

    $vehiculo=new Vehiculo("");

    $resultado=$vehiculo->getMarca();
    echo "$resultado<br>";
    $vehiculo->setMarca("Ferrari");
    $resultado=$vehiculo->getMarca();
    echo "$resultado<br>";
    
?>
