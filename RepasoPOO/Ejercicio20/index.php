<?php
    class UsuarioActivo{
        public static $contador=0;
       public static function iniciarSesion(){
            self::$contador++;
       }

       public static function cerrarSesion(){
            if(self::$contador>0){
                self::$contador--; 
            }
       }

       public static function obtenerUsuariosActivos(){
        return self::$contador;
       }
    }
    echo UsuarioActivo::iniciarSesion();
    echo UsuarioActivo::iniciarSesion();
    echo UsuarioActivo::iniciarSesion();
    echo UsuarioActivo::iniciarSesion();

    echo UsuarioActivo::cerrarSesion();
    echo UsuarioActivo::cerrarSesion();

    echo UsuarioActivo::obtenerUsuariosActivos();
?>