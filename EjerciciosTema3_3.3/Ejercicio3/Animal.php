<?php
    class Animal{
        public $especie;

        public function __construct($e){
            $this->especie=$e;
        }

        public function HacerSonido(){
            return "El animal hace GRRRRRR<BR>";
        }
        public function getEspecie() {
            return $this->especie."<br>";
        }
        public function setEspecie($e) {
            $this->especie=$e;
        }
    }

    class Perro extends Animal{

        public function __construct($e){
            parent::__construct($e);
        }

        public function HacerSonido(){
            return "El perro hace Guau<br>";
        }
    }
    $perro=new Perro("Chiguagua");
    $perro->setEspecie("Otto");
    echo $perro->getEspecie();

    echo $perro->HacerSonido();
?>
