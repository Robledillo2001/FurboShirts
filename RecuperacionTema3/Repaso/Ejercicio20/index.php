<?php
    class Cliente{
        public static $puntosComunes=0;

        public static function agregarPuntos(int $pts){
            self::$puntosComunes+=$pts;
        }

        public static function obternerPuntosComunes(){
            return self::$puntosComunes;
        }
    }
    CLIENTE::agregarPuntos(15);
    CLIENTE::agregarPuntos(15);
    echo CLIENTE::obternerPuntosComunes();
?>
