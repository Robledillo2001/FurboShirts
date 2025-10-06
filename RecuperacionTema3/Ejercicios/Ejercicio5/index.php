<?php
    abstract class Proyecto{
        public float $presupuesto;
        public function __construct($p){
            $this->presupuesto=$p;
        }

        abstract public function calcularDuracion();
    }

    class ProyectoConstruccion extends Proyecto{
        public function calcularDuracion(){
            if($this->presupuesto>0&&$this->presupuesto<=100000){
                return "Duraccion del proyecto 6 años";
            }elseif($this->presupuesto>100000&&$this->presupuesto<=200000){
                return "Duraccion del proyecto 4 años";
            }else{
                return "Duraccion del proyecto 2 años";
            }
        }
    }

    class ProyectoSoftware extends Proyecto{
        public function calcularDuracion(){
            if($this->presupuesto>0&&$this->presupuesto<=50000){
                return "Duraccion del proyecto 6 años";
            }elseif($this->presupuesto>50000&&$this->presupuesto<=100000){
                return "Duraccion del proyecto 4 años";
            }else{
                return "Duraccion del proyecto 2 años";
            }
        }
    }
    $const=new ProyectoConstruccion(10000);
    $soft=new ProyectoSoftware(55000);

    echo $const->calcularDuracion();
    echo $soft->calcularDuracion();
?>
