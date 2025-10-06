<?php
    abstract class Vehiculo{
        public float $velocidadMaxima;

        public function __construct($vM){
            $this->velocidadMaxima=$vM;
        }

        abstract public function arrancar();
        abstract public function detener(); 
    }

    class Coche extends Vehiculo{
        public function arrancar(){
            echo "Coche arrancando";
        }

        public function detener(){
            return "Coche detenido";
        }
    }

    class Camion extends Vehiculo{
        public float $carga;

        public function __construct($vM,$c){
            parent::__construct($vM);
            $this->carga=$c;
        }
        public function arrancar(){
            echo "Camion arrancando";
        }

        public function detener(){
            return "Camion detenido";
        }

        public function cargarMercancias($carga){
            if($carga>500){
                return "No se puede cargar mas peso";
            }
            $this->carga+=$carga;
            return"Carga de ".$this->carga."KGS";
        }
    }

    class Bici extends Vehiculo{
        public function arrancar(){
            echo "Bici arrancando";
        }

        public function detener(){
            return "Bici detenido";
        }
        public function pedalear(){
            return "Bici pedaleando";
        }
    }

    $camion=new Camion(150,100);

    echo $camion->cargarMercancias(700);

    echo $camion->arrancar();
    echo $camion->detener();
?>
