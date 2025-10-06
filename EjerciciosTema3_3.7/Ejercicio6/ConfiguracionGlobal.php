<?php
  class configuracionGlobal{
    public static string $nombreAplicacion = "MiAplicacion";
    public static string $version = "1.0.0";
    public static string $idiomaPredeterminado = "eng";

    public function __construct() {
      // Si realmente necesitas un constructor, no cambiaría las propiedades estáticas
      // Sino puedes mostrar un mensaje, pero no cambiar las propiedades estáticas
      echo "Configuración Global ha sido creada :<br>";
    }
    public static function obtenerConfiguraciones(){
      return "Nombre app: ".self::getNombre()."<br>Version: ".self::getVersion()."<br>Idioma: ".self::getIdioma()."<br><br>";
    }
    public static function setIdioma($name){
      self::$idiomaPredeterminado=$name;
    }

    public static function setVersion($name){
      self::$version=$name;
    }

    public static function setNombre($name){
      self::$nombreAplicacion=$name;
    }

    public static function getIdioma(){
      return self::$idiomaPredeterminado;
    }

    public static function getVersion(){
      return self::$version;
    }

    public static function getNombre(){
      return self::$nombreAplicacion;
    }
  }

  $cg=new configuracionGlobal();
  echo $cg->obtenerConfiguraciones();
  echo $cg->setIdioma("Español");
  echo $cg->obtenerConfiguraciones();
?>