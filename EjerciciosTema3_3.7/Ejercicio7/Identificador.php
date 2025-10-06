<?php
class Usuario {
    public $nombre;
    public $contraseña;
    public $pais;

    public function __construct($n,$c,$p){
        $this->pais=$p;
        $this->nombre=$n;
        $this->contraseña=$c;
        self::$id++;
    }
    public static $id = 0; // Propiedad estática para contar el número de IDs

    // Método estático para contar los IDs de usuarios
    public static function contarIds() {
        return self::$id; // Devuelve el valor actual del contador
    }
}

// Crear instancias de la clase Usuario
$usuario1 = new Usuario("ruben",1234,"España");
$usuario2 = new Usuario("david",1234,"España");
$usuario3 = new Usuario("pablo",1234,"España");

// Llamar al método estático desde la clase, no desde la instancia
echo $usuario1->contarIds();  // Muestra el valor del contador, en este caso 1
?>
