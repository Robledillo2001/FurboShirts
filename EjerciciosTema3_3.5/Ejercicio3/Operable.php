<?php
   Interface Operable{
    public function encender($e):void;
   }
   Interface Volable{
    public function volar():void;
   }

   class Avion implements Operable,Volable{
    private $encemdido;

    public function __construct($e){
        $this->encemdido=$e;
    }

    public function encender($e): void{
        $this->encemdido=$e;

        if($e==true){
            echo "El avion esta encendido";
        }else{
            echo "El avion esta apagado";
        }
    }

    public function volar():void{
        if ($this->encemdido) {
            echo "El avión está volando.";
        } else {
            echo "No se puede volar porque el avión está apagado.";
        }
    }
   }
   $avion=new Avion(false);

   $avion->volar();
   echo "<br>";
   $avion->encender(true);
   echo "<br>";
   $avion->volar();
?>
