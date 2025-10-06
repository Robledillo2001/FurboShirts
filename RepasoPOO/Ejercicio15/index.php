<?php
    class Persona{
        private $edad;
        public function __construct(int $e)
        {
            $this->edad=$e;
        }

        public function esMayorDeEdad(){
            if($this->edad>=18){
                return true;
            }
            return false;
        }
    }

    $persona=new Persona(13);
    echo $persona->esMayorDeEdad();
?>