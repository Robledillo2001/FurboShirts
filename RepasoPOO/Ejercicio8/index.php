<?php
    interface Alquilable{
        public function calcularCosto($dias);
    }

    abstract class Vehiculo implements Alquilable{
        public string $marca;
        public string $modelo;
        public int $anio;
        public float $precio;
        protected static int $totalAlquilados=0;
        public function __construct(string $marca,string $modelo,int $anio,float $precio){
            $this->marca=$marca;
            $this->modelo=$modelo;
            $this->anio=$anio;
            $this->precio=$precio;
        }

        public static function mostrarTotalAlquilados(){
            return "<h2>Total de alquileres:".self::$totalAlquilados."</h2>";
        }

        abstract public function calcularCosto($dias);
    }

    class Coche extends Vehiculo{
        public function calcularCosto($dias){
            self::$totalAlquilados+=1;
            $total=$this->precio*$dias;
            return "<p>El costo total del Coche es de {$total}€</p>";
        }
    }

    class Moto extends Vehiculo{
        public function calcularCosto($dias){
            self::$totalAlquilados+=1;
            $total=$this->precio*$dias;
            return "<p>El costo total de la Moto es de {$total}€</p>";
        }
    }

    class Furgoneta extends Vehiculo{
        public function calcularCosto($dias){
            self::$totalAlquilados+=1;
            $total=$this->precio*$dias;
            return "<p>El costo total de la fregoneta es de {$total}€</p>";
        }
    }
    //MOstrar datos
    $coche=new Coche("Toyota","Supra",1998,1500);
    echo $coche->calcularCosto(7);

    $moto=new Moto("Ducatti","99RS",2007,900);
    echo $moto->calcularCosto(7);

    $furgoneta=new Furgoneta("Renault","Kangoo",2009,200);
    echo $furgoneta->calcularCosto(7);

    echo Vehiculo::mostrarTotalAlquilados();
?>