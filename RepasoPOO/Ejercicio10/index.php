<?php
   class Animal{
    public string $nombre;
    public int $edad;

    public function __construct(string $n, int $e){
        $this->nombre=$n;
        $this->edad=$e;
    }

    public function hecerSonido(){
        return "BRRRRRRR";
    }

   }

   class Perro{
    public function hacerSonido(){
        return "Guau!";
    }
   }
?>