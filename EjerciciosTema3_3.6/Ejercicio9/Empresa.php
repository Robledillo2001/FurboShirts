<?php
   abstract class Mantenimiento{
    protected string $operario;
    protected int $duracion;
    public function __construct(string $nombre="",int $duracion=0){
        $this->operario=$nombre;
        $this->duracion=$duracion;
    }

    abstract protected function asignarOperario(string $nombre);
    abstract protected function registrarDuracion(int $dias);
   }

   class Limpieza extends Mantenimiento{
    public $productos;

    public function __construct(){
        parent::__construct();
        $this->productos=[];
    }

    protected function asignarOperario(string $nombre){
        $this->operario=$nombre;
    }

    protected function registrarDuracion(int $dias){
        $this->duracion=$dias;
    }
    public function IngresarOperario(string $nombre,int $dias){
        $this->asignarOperario($nombre);
        $this->registrarDuracion($dias);

        return "El operario ".$this->operario." fue asignado ".$this->duracion." dias<br>";
    }

    public function IngresarProductos(string $producto){
        $this->productos[]=$producto;
    }

    public function ObtenerProductos(){
        foreach($this->productos as $productos=>$producto){
            echo "Producto ".$productos."->$producto<br>";
        }
    }
   }
   class Reparacion extends Mantenimiento{
    public $piezas;

    public function __construct(){
        parent::__construct();
        $this->piezas=[];
    }

    protected function asignarOperario(string $nombre){
        $this->operario=$nombre;
    }

    protected function registrarDuracion(int $dias){
        $this->duracion=$dias;
    }
    public function IngresarOperario(string $nombre,int $dias){
        $this->asignarOperario($nombre);
        $this->registrarDuracion($dias);

        return "El operario ".$this->operario." fue asignado ".$this->duracion." dias<br>";
    }

    public function IngresarPiezas(string $pieza){
        $this->piezas[]=$pieza;
    }

    public function ObtenerPiezas(){
        foreach($this->piezas as $piezas=>$pieza){
            echo "PIeza $piezas->$pieza<br>";
        }
    }
   }
   class Inspeccion extends Mantenimiento{
    public $productos;

    public function __construct(){
        parent::__construct();
        $this->productos=[];
    }

    protected function asignarOperario(string $nombre){
        $this->operario=$nombre;
    }

    protected function registrarDuracion(int $dias){
        $this->duracion=$dias;
    }
    public function IngresarOperario(string $nombre,int $dias){
        $this->asignarOperario($nombre);
        $this->registrarDuracion($dias);

        return "El operario ".$this->operario." fue asignado ".$this->duracion." dias<br>";
    }
   }
   $limpiador=new Limpieza();
   echo $limpiador->IngresarOperario("Niko",5);
   $limpiador->IngresarProductos("Legia");
   $limpiador->IngresarProductos("Jabon");
   $limpiador->ObtenerProductos();

   $mecanino=new Reparacion();
   echo $mecanino->IngresarOperario("Roman",7);
   $mecanino->IngresarPiezas("Engranaje");
   $mecanino->IngresarPiezas("Llave");
   $mecanino->ObtenerPiezas();

   $inspector=new Inspeccion();
   echo $inspector->IngresarOperario("Roble",20);
?>
