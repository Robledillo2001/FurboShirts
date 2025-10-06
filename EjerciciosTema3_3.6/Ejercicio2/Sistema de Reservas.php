<?php
    abstract class Habitacion{
        public int $camas;
        protected float $precio;

        public function __construct(int $c,float $p){
            $this->camas=$c;
            $this->precio=$p;

        }
        public function calcularPrecio(){

        }
    }

    class HabitacionSimple extends Habitacion{
        protected int $nNoches;
        public function __construct(int $c,float $p,int $n){
            parent::__construct($c,$p);
            $this->nNoches=$n;
        }

        public function calcularPrecio(){
            $resultado=$this->nNoches*$this->precio;
            return "El precio de la habitacion por ".$this->nNoches." es de  ".$resultado."€";
        }
    }

    class HabitacionLujo extends Habitacion{
        protected int $nNoches;
        public function __construct(int $c,float $p,int $n){
            parent::__construct($c,$p);
            $this->nNoches=$n;
        }

        public function calcularPrecio(){
            $resultado=pow($this->nNoches,2)*$this->precio;
            return "El precio de la habitacion por ".$this->nNoches." noches es de  ".$resultado."€";
        }
    }
    $hSimple=new HabitacionSimple(2,20.67,3);
    echo $hSimple->calcularPrecio()."<BR>";

    $hLujo=new HabitacionLujo(2,20.67,3);
    echo $hLujo->calcularPrecio()."<BR>";
?>
