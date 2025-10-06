<?php
    class Vehiculo{
        private $motor;

        public function __construct($m){
            $this->motor=$m;
        }

        public function encender($contacto){
            $this->motor=$contacto;
            return $this->mostrarMotor();
        }

        private function mostrarMotor(){
            if($this->motor==true){
                return "El motor ya esta encendido";
            }else{
                return "El motor esta apabado";
            }
        }
    }
    $vehiculo=new Vehiculo(false);

    echo $vehiculo->encender(true);
?>