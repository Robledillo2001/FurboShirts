<?php
    class Animal {
        public $especie;
        public $edad;

        // Constructor inside the class
        public function __construct(string $especie, int $edad) {
            // Properly assigning values to class properties
            $this->especie = $especie;
            $this->edad = $edad;
        }

        public function getEspecie(){
            return "La especie de animal es ".$this->especie;
        }

        public function getEdad(){
            return "La edad del animal es de ".$this->edad." años";
        }

        public function setEspecie(string $especie){
            $this->especie=$especie;
        }

        public function setEdad(int $edad){
             $this->edad=$edad;
        }

        public function emitirSonido(string $sonido){
           if(empty($sonido)){
            return"Sonido de animal esta vacio";
           }else{
            return"Sonido de animal es de $sonido";
           }
        }
    }

    $animal=new Animal("Panda",15);
    $animal->setEspecie("Tigre");
    $animal->setEdad("12");
    echo $animal->getEspecie()."<br>".$animal->getEdad()."<br>";
    $sonidoEmitido=$animal->emitirSonido("grrrrrr");
    echo"$sonidoEmitido";
?>
