<?php
    class Trabajador{
        public $nombre;
        public $salario;

        public function __construct(string $n,float $s)
        {
            $this->nombre=$n;
            $this->salario=$s;
        }

        public function getNombre(){
            return $this->nombre."<br>";
        }

        public function setNombre(string $n){
            $this->nombre=$n;
        }


        public function getSalario(){
            return $this->salario."<br>";
        }

        public function setSalario(float $s){
            $this->salario=$s;
        }

        public function  aplicarBonificacion(float $bonificacion){
            if($bonificacion<=0){
                return "La bonificacion no se puede añadir<br>";
            }else{
                $porcentaje=$this->salario*($bonificacion/100);
                $this->salario+=$porcentaje;
                return "El salario ahora es de ".$this->salario."€<br>";
            }
        }
    }
    $trabajador=new Trabajador("Ruben",1200);

    echo $trabajador->getNombre();
    echo $trabajador->getSalario();

    echo $trabajador->aplicarBonificacion(8);
?>
