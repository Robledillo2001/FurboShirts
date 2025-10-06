<?php
    class Animal{
        protected string $especie;

        public function __construct(string $esp){
            $this->especie=$esp;
        }

        public function getEspecie(){
            return $this->especie;
        }

        public function setEspecie($name){
            $this->especie=$name;
        }
    }

    class Gato extends Animal{
        public function __construct($esp){
            parent::__construct($esp);
        }

        public function mostrarEspecie(){
            return "La especie de gato es ".$this->especie;
        }
    }
    $gato=new Gato("Red Doted");
    echo $gato->getEspecie()."<br>";
    echo $gato->mostrarEspecie()."<br>";
?>