<?php
    class Vehiculo{
        public $marca;
        public $modelo;
        public $velocidad;

        public function __construct($mar,$mod,$vel){
            $this->marca=$mar;
            $this->modelo=$mod;
            $this->velocidad=$vel;
        }

        public function getMarca(){
            return $this->marca;
        }
        
        public function getModelo(){
            return $this->modelo;
        }

        public function getVelocidad(){
            return $this->velocidad;
        }

        public function setMarca($mar){
             $this->marca=$mar;
        }
        
        public function setModelo($mod){
             $this->modelo=$mod;
        }

        public function setVelocidad($vel){
             $this->velocidad=$vel;
        }

        public function acelerar(){
            $this->velocidad+=20;
            return "La velocidad es de ".$this->velocidad."Km/h";
        }
    }
    class Moto extends Vehiculo{
        public function __construct($mar,$mod,$vel){
            parent::__construct($mar,$mod,$vel);
        }

        public function acelerar(){
            return parent::acelerar();
        }
    }

    $moto=new Moto("Ducatti","Ns",259);

    echo "Marca: ".$moto->getMarca()." <br>";
    echo "Modelo: ".$moto->getModelo()." <br>";
    echo "Velocidad ".$moto->getVelocidad()." Km/h<br>";
    echo $moto->acelerar()."<br>";
?>
