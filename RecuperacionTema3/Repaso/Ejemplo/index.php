<?php

class Base{
    protected static $valor="Base";
    public static function mostrarValor(){
    echo self::$valor;
    }
    }
    Class Derivada extends Base{
    Protected static $valor="Derivada";
    }
    Derivada::mostrarValor();
?>
