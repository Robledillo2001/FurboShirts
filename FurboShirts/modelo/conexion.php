<?php
    class Conexion{
        public static function conexion(){
            // Ejemplo de cómo debe quedar en tu archivo:
            //$conexion = new PDO("mysql:host=sql200.infinityfree.com;dbname=if0_41118357_furboshirts;charset=utf8", "if0_41118357", "PpswY01iVwhHZ");
            $conexion = new PDO("mysql:host=localhost;dbname=furboshirts;charset=utf8", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        }
    }
?>