<?php
   class DispositivoElectronico{
    public $estado;

    public function __construct($e){
        $this->estado=$e;
    }

    public function encender($e){
        if($e==true){
            $this->estado=$e;
            return "El dispositivo se ha encendido<br>";
        }else{
            return"No se pudo encender el dispositivo<br>";
        }
    }

    public function apagar($e){
        if($e==false){
            $this->estado=$e;
            return "El dispositivo se ha apagado<br>";
        }else{
            return"No se pudo apagar el dispositivo<br>";
        }
    }
   }
   $dispositivo=new DispositivoElectronico(false);

   echo $dispositivo->encender(true);
   echo $dispositivo->encender(false);

   echo $dispositivo->apagar(true);
   echo $dispositivo->apagar(false);
?>
