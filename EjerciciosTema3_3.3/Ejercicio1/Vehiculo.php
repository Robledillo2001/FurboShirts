<?php
   class Vehiculo{
    public $marca;
    public $modelo;
    public $velocidadMaxima;

    public function __construct($mar,$mod,$vel){
        $this->marca=$mar;
        $this->modelo=$mod;
        $this->velocidadMaxima=$vel;
    }


    public function getMarca(){
        return $this->marca."<br>";
    }

    public function getModelo(){
        return $this->modelo."<br>";
    }

    public function getVelocidadMaxima(){
        return $this->velocidadMaxima."<br>";
    }

    public function setMarca($mar){
        $this->marca=$mar;
    }

    public function setModelo($mod){
        $this->modelo=$mod;
    }

    public function setVelocidadMaxima($vel){
         $this->velocidadMaxima=$vel;
    }
   }
   class Coche extends Vehiculo{
    public $puertas;

    public function __construct($mar,$mod,$vel,$p) {
        parent::__construct($mar,$mod,$vel);
        $this->puertas = $p;
    }

    public function getPuertas(){
        return $this->velocidadMaxima."<br>";
    }

    public function setPuertas($p){
        $this->puertas=$p;
    }

    public function mostrarInformacion(){
        return "Marca:".$this->marca."<br>Modelo:".$this->modelo."<br>Velocidad Maxima:".$this->velocidadMaxima."<br>Puertas".$this->puertas;
    }
   }
   $coche=new Coche("Toyota","Supra",320,2);

   echo $coche->mostrarInformacion();
?>
