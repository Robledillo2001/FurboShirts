<?php
    abstract class Empleado{
        public string $nombre;
        public string $apellidos;
        public string $DNI;
        public float $sueldo;

        public static $contador=0;
        public function __construct($n,$a,$d,$s){
            $this->nombre=$n;
            $this->apellidos=$a;
            $this->DNI=$d;
            $this->sueldo=$s;
            self::$contador++;
        }

        public function getSueldo(){
            return $this->sueldo;
        }

        abstract public function calcularSalario();
    }

    class Directivo extends Empleado{
        public function __construct($n,$a,$d,$s){
            parent::__construct($n,$a,$d,$s);
        }
        public function calcularSalario(){
            $this->sueldo+=$this->sueldo*0.25;
        }
    }

    class Encargado extends Empleado{
        public function __construct($n,$a,$d,$s){
            parent::__construct($n,$a,$d,$s);
        }
        public function calcularSalario(){
            $this->sueldo+=300;
        }
    }

    class Trabajador extends Empleado{
        public function __construct($n,$a,$d,$s){
            parent::__construct($n,$a,$d,$s);
        }
        public function calcularSalario(){
            $this->sueldo=$this->sueldo;
        }
    }

    $Directivo=new Directivo("","","",20000);
    $Directivo->calcularSalario();
    echo $Directivo->getSueldo()."<br>";

    $Encargao=new Encargado("","","",20000);
    $Encargao->calcularSalario();
    echo $Encargao->getSueldo()."<br>";
    
    $Trabajador=new Trabajador("","","",20000);
    $Trabajador->calcularSalario();
    echo $Trabajador->getSueldo()."<br>";

    $t1=new Trabajador("","","",20000);
    $t2=new Trabajador("","","",20000);
    $t3=new Trabajador("","","",20000);

    echo Empleado::$contador;
?>