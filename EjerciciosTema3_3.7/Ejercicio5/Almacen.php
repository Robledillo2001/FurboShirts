<?php
  abstract class Almacen{
    public static $productosTotales=0;

    public function __construct(){
        self::$productosTotales++;
    }

    abstract public static function mostrarProductos();
  }
  class productoElectronico extends Almacen{
    public function __construct(){
        parent::__construct();
    }

    public static function mostrarProductos(){
        return "Productos del almacen ".self::$productosTotales;
    }
  }

  class productoRopa extends Almacen{
    public function __construct(){
        parent::__construct();
    }

    public static function mostrarProductos(){
        return "Productos del almacen ".self::$productosTotales;
    }
  }
  $ropa=new productoRopa();
  $tv=new productoElectronico();
  echo $ropa->mostrarProductos();
?>