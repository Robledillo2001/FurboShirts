<?php
    class BaseDatos{
        public static $conexion=false;

        public static function conexion(){
            if(self::$conexion==false){
                self::$conexion=true;
                echo "Conectado a la BSD";
            }else{
                echo"Ya esta conectado a la BSD!";
            }
        }
    }
    $BSD=new BaseDatos();

    $BSD->conexion();
?>
