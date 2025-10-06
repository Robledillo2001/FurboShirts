<?php
   Interface Saludable{
    public function realizarEjercicio():void;
   }
   class Persona{
    public string $nombre;
    protected int $edad;

    public function __construct(string $n,int $e){
        $this->nombre=$n;
        $this->edad=$e;
    }

    public function presentarse(){
        return "Hola me llamo".$this->nombre." y tengo ".$this->edad." años";
    }
   }

   class Deportista extends Persona implements Saludable{
    public function __construct(string $n,int $e){
        parent::__construct($n,$e);
    }
    public function realizarEjercicio(): void{
        echo "Esta persona esta haciendo ejercicio";
    }
   }

   $deportista=new Deportista("Martin",50);

   echo $deportista->presentarse()."<br>";
   $deportista->realizarEjercicio();
?>
