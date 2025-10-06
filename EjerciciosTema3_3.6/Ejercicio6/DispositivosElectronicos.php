<?php
    abstract class Dispositivo{
        protected $boton;
        protected float $bateria;

        public function __construct(float $bat){
            $this->bateria=$bat;
        }

        abstract public function encender($bot=true);

        abstract public function apagar($bot=false);
    }

    class Telefono extends Dispositivo{
        public function __construct(float $bat){
            parent::__construct($bat);
        }

        public function encender($boton=true){
            $this->boton=$boton;
            if($this->boton==true){
                if($this->bateria>0){
                    return "Movil encendido<br> Bateria-->".$this->bateria."%<br>";
                }else{
                    return "Movil no se puede encender pòrque no hay bateria<br>";
                }
            }else{
                return "No se puede encender el Dispositivo<br>";
            }
        }

        public function apagar($boton=false){
            $this->boton=$boton;
            if($this->boton==false){
                return "Dispositivo apagado<br>";
            }else{
                return "No se puede apagar el dispositivo<br>";
            }
        }

        public function realizarLlamadas(string $nombre){
            return "Llamando a $nombre";
        }
    }

    class Portatil extends Dispositivo{
        public function __construct(float $bat){
            parent::__construct($bat);
        }

        public function encender($boton=true){
            $this->boton=$boton;
            if($this->boton==true){
                if($this->bateria>0){
                    return "Portatil encendido<br> Bateria-->".$this->bateria."%<br>";
                }else{
                    return "Portatil no se puede encender pòrque no hay bateria<br>";
                }
            }else{
                return "No se puede encender el Dispositivo<br>";
            }
        }

        public function apagar($boton=false){
            $this->boton=$boton;
            if($this->boton==false){
                return "Dispositivo apagado<br>";
            }else{
                return "No se puede apagar el dispositivo<br>";
            }
        }

        public function conectarseinternet(){
            return "Conexion completada";
        }
    }

    class Tablet extends Dispositivo{
        public function __construct(float $bat){
            parent::__construct($bat);
        }

        public function encender($boton=true){
            $this->boton=$boton;
            if($this->boton==true){
                if($this->bateria>0){
                    return "Tablet encendido<br> Bateria-->".$this->bateria."%<br>";
                }else{
                    return "Tablet no se puede encender pòrque no hay bateria<br>";
                }
            }else{
                return "No se puede encender el Dispositivo<br>";
            }
        }

        public function apagar($boton=false){
            $this->boton=$boton;
            if($this->boton==false){
                return "Dispositivo apagado<br>";
            }else{
                return "No se puede apagar el dispositivo<br>";
            }
        }
    }

    $telefono=new Telefono(100);

    echo $telefono->encender();
    echo $telefono->apagar();
?>
