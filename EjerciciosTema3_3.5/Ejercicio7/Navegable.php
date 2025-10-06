<?php
   Interface Navegable{
     public function navegar():void;
   }
    class Barco{
        protected $navegacion;

        public function __construct($n) {
            $this->navegacion = $n;
        }

        // Implementamos navegar() como protected
        protected function navegar(): void {
            echo "El barco está navegando en modo: " . $this->navegacion . "<br>";
        }
    }
    class BarcoPesquero extends Barco implements Navegable{
        public function __construct($n){
            parent::__construct($n);
        }

        public function navegar():void{
            echo "El barco está navegando en modo: " . $this->navegacion . "<br>";
        }
    }

    $barco=new BarcoPesquero("Crucero");

    $barco->navegar();
?>
