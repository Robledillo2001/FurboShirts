<?php
    class Cliente{
        public static $puntosComunes=0;

        public static function agregarPuntos($puntos){
            self::$puntosComunes+=$puntos;
        }

        public static function obtenerPuntos(){
            return "Puntos totales=".self::$puntosComunes."<br>";
        }
    }
    $cliente1=new Cliente();
    $cliente2=new Cliente();
    $cliente3=new Cliente();

    $cliente1->agregarPuntos(50);
    $cliente2->agregarPuntos(9);
    $cliente3->agregarPuntos(45);

    echo $cliente2->obtenerPuntos();
?>
