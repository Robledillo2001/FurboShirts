<?php
    class ConexionBSD{
        private static $conexion=null;
        public static function conectar(string $ip){
            if(self::$conexion===null){
                self::$conexion=$ip;
            }else{
                echo "Ya hay una conexion en la BSD debes desconectar la conexion anterior<BR>";
            }
        }

        public static function desconectar(){
            self::$conexion=null;
            echo "Desconenctado de la BSD<BR>";
        }
    }

    ConexionBSD::conectar("192.167.45.3");
    ConexionBSD::conectar("193.218.44.12");
    ConexionBSD::desconectar();
    ConexionBSD::conectar("193.218.44.12");

    /*$conexion=new ConexionBSD();
    $conexion->conectar("192.167.49.5");

    $conexion2=new ConexionBSD();
    $conexion2->conectar("192.167.49.5");

    $conexion3=new ConexionBSD();
    $conexion3->desconenctar();
    $conexion3->conectar("192.167.49.5");*/
?>
