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

        protected function encender(){
            return "Vehiculo encendido";
        }
   }
   class Coche extends Vehiculo{
    public function __construct($mar,$mod,$vel){
        parent::__construct($mar,$mod,$vel);
    }

    public function encender(){
        return "Coche encendido";
    }
   }

   $coche=new Coche("Opel","Costra",175);

   echo $coche->encender();
?>
