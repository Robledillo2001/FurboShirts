<?php
    abstract class Vehiculo{
        public string $marca;
        public string $modelo;
        public int $velMaxima;

        public function __construct(string $mar,string $mod,int $vel){
            $this->marca=$mar;
            $this->modelo=$mod;
            $this->velMaxima=$vel;
        }

        abstract protected function acelerar($var);
        abstract protected function detener($var);

        public function obtenerVelocidadMaxima(): string {
            return "La velocidad máxima de $this->marca $this->modelo es $this->velMaxima km/h<br>";
        }
    }
    class Coche extends Vehiculo{
        public function __construct(string $mar,string $mod,int $vel){
            parent::__construct($mar,$mod,$vel);
        }

        protected function acelerar($bool){
            return "El coche esta acelerando<br> Maxima velocidad posible=".$this->velMaxima."<br>";
        }

        protected function detener($bool){
            return "El coche se ha detenido"."<br>";
        }

        public function movimiento($bool){
            if(is_bool($bool)){
                if($bool==true){
                    echo $this->acelerar($bool);
                }else{
                    echo $this->detener($bool);
                }
            }else{
                echo "Error en el programa"."<br>";
            }
        }
    }

    class Camion extends Vehiculo{
        public $cargaMaxima;
        public function __construct(string $mar,string $mod,int $vel,float $c){
            parent::__construct($mar,$mod,$vel);
            $this->cargaMaxima=$c;
        }

        protected function acelerar($bool){
            return "El coche esta acelerando<br> Maxima velocidad posible=".$this->velMaxima."<br>";
        }

        protected function detener($bool){
            return "El coche se ha detenido"."<br>";
        }

        public function movimiento($bool){
            if(is_bool($bool)){
                if($bool==true){
                    echo $this->acelerar($bool);
                }else{
                    echo $this->detener($bool);
                }
            }else{
                echo "Error en el programa"."<br>";
            }
        }

        public function cargar($carga){
            if($carga>$this->cargaMaxima){
                return "La capacidad MAXIMA se ha superado!"."<br>";
            }else if($carga<$this->cargaMaxima){
                $resultado=$this->cargaMaxima-$carga;
                return "La cargamento cargado quedan $resultado KG"."<br>";
            }else{
                $resultado=$this->cargaMaxima-$carga;
                return "Cargamento completo"."<br>";
            }
        }
    }
    class Bicicleta extends Vehiculo{
        public function __construct(string $mar,string $mod,int $vel){
            parent::__construct($mar,$mod,$vel);
        }

        protected function acelerar($bool){
            return "La bici esta acelerando<br> Maxima velocidad posible=".$this->velMaxima."<br>";
        }

        protected function detener($bool){
            return "La bici se ha detenido"."<br>";
        }

        protected function movimiento($bool){
            if(is_bool($bool)){
                if($bool==true){
                    echo $this->acelerar($bool);
                }else{
                    echo $this->detener($bool);
                }
            }else{
                echo "Error en el programa";
            }
        }

        public function pedalear($bool){
            $this->movimiento($bool);
        }
    }
    $Coche=new Coche("Mazda","RX8",251);
    $Coche->movimiento(true);

    $Camion=new Camion("Volvo","ns",189,30000);
    echo $Camion->cargar(29000);

    $bici=new Bicicleta("a","ab",50);
    $bici->pedalear(true);
    echo $Coche->obtenerVelocidadMaxima();
?>
