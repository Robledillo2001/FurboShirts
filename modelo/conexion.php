<?php
    require_once "config.php";
    class Conexion{
        public static function conexion(){
            global $dbhost, $dbname, $dbuser, $dbpasswd;

            conexion();
            $conexion = new PDO("mysql:host=".$dbhost.";dbname=".$dbname.";charset=utf8", $dbuser, $dbpasswd);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        }
    }
?>