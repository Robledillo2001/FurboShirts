<?php
interface Jugable {
    public function jugar();
}

abstract class Juego implements Jugable {
    public static int $totalPuntos = 0;

    abstract public function jugar();

    // Método opcional para ver el total
    public static function obtenerPuntajeTotal() {
        return self::$totalPuntos;
    }
}

class JuegoAventura extends Juego {
    public function jugar() {
        self::$totalPuntos += 50;
        echo "Jugaste un juego de Aventura. +50 puntos<br>";
    }
}

class JuegoPuzzle extends Juego {
    public function jugar() {
        self::$totalPuntos += 30;
        echo "Jugaste un juego de Puzzle. +30 puntos<br>";
    }
}

class JuegoDeportes extends Juego {
    public function jugar() {
        self::$totalPuntos += 40;
        echo "Jugaste un juego de Deportes. +40 puntos<br>";
    }
}

// Instancias y ejecución
$aventura = new JuegoAventura();
$puzzle = new JuegoPuzzle();
$deportes = new JuegoDeportes();

$aventura->jugar();  // +50
$puzzle->jugar();    // +30
$deportes->jugar();  // +40
$deportes->jugar();  // +40

// Mostrar total
echo "Puntaje total acumulado: " . Juego::obtenerPuntajeTotal() . " puntos<br>";
?>
