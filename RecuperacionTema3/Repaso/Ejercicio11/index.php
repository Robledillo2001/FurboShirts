<?php
    abstract class Vehiculo{
        public $marca;
        public $velocidadMax;

        public function __construct(string $m,int $vel){
            $this->marca=$m;
            $this->velocidadMax=$vel;
        }

        abstract public function arrancar();
        abstract public function detener();
    }

    class Coche extends Vehiculo{
        public function __construct($m,$vel){
            parent::__construct($m,$vel);
        }

        public function arrancar(){
            return "El coche esta arrancando y solo podra llegar a ".$this->velocidadMax."KM/H";
        }

        public function detener(){
            return "El coche se ha dertenido";
        }
    }

    class Camion extends Vehiculo{
        public float $mercancia=0;
        public function __construct($m,$vel){
            parent::__construct($m,$vel);
        }

        public function arrancar(){
            return "El camion esta arrancando y solo podra llegar a ".$this->velocidadMax."KM/H";
        }

        public function detener(){
            return "El camion se ha dertenido";
        }

        public function cargarMercancia($merc){
            if($merc<=1200.5){
                $this->mercancia+=$merc;
                return "Se ha cargado $merc KG de mercancia en el camion";
            }else{
                return "No cabe mas cargamento";
            }
            
        }
    }

    class Bici extends Vehiculo{
        public function __construct($m,$vel){
            parent::__construct($m,$vel);
        }

        public function arrancar(){
            return "La bici esta arrancando y solo podra llegar a ".$this->velocidadMax."KM/H";
        }

        public function detener(){
            return "La bici se ha dertenido";
        }

        public function pedalear(){
            return "Bici pedaleando";
        }
    }
    // Creando instancias de cada clase
    $coche = new Coche("Toyota", 180);
    echo $coche->arrancar() . "<br>";
    echo $coche->detener() . "<br>";

    $camion = new Camion("Volvo", 120);
    echo $camion->arrancar() . "<br>";
    echo $camion->detener() . "<br>";
    echo $camion->cargarMercancia(500) . "<br>";

    $bici = new Bici("BMX", 30);
    echo $bici->arrancar() . "<br>";
    echo $bici->detener() . "<br>";
    echo $bici->pedalear() . "<br>";
?>
