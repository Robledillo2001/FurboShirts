<?php
    abstract class Habitacion{
        public $precio;
        public $noches;

        public function __construct(float $precio,int $noches){
            $this->precio=$precio;
            $this->noches=$noches;
        }

        abstract public function calcularPrecio();
    }
    class HabitacionSimple extends Habitacion{
        public function __construct($p,$n){
            parent::__construct($p,$n);
        }

        public function calcularPrecio(){
            $this->precio+=($this->precio*0.1)*$this->noches;
            return $this->precio;
        }
    }
    
    class HabitacionLujo extends Habitacion{
        public function __construct($p,$n){
            parent::__construct($p,$n);
        }

        public function calcularPrecio(){
            $this->precio+=($this->precio*0.5)*$this->noches;
            return $this->precio;
        }
    }

    $lujo=new HabitacionLujo(70,4);

    $simple=new HabitacionSimple(70,4);

    echo "Precio Habitacion= ".$lujo->calcularPrecio();
    echo "<br>";
    echo "Precio Habitacion= ".$simple->calcularPrecio();
?>
