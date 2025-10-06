<?php
   class Producto{
    private string $nombre;
    private float $precio;

    public function __construct(string $n,float $p){
      $this->nombre=$n;
      $this->precio=$p;
    }

    public function getNombre(){
      return $this->nombre;
    }

    public function getPrecio(){
      return $this->precio;
    }

    public function setNombre($n){
      $this->nombre=$n;
    }

    public function setPrecio($p){
      $this->precio=$p;
    }
   }
   $producto=new Producto("Cerdo",5);

   echo "Nombre:".$producto->getNombre()."<br>".$producto->getPrecio()."<br>"
?>
