<?php
    interface Operable{
        public function encender();
    }

    interface Volable{
        public function volar();
    }

    class Avion implements Operable, Volable{
        private int $altitud;

        public function __construct(int $altitud) {
            $this->altitud = $altitud;
        }

        public function encender(){
            return "El avion se ha encendido";
        }

        
        public function volar(){
            return "El avion vuela a una altitud de ".$this->altitud;
        }
    }

    $avion=new Avion(1250);
    echo "<p>".$avion->encender()."</p>
    <p>".$avion->volar()."</p>";
?>