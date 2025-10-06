<?php
class Vehiculo {
    public static int $contador = 0;  // Ensure you're using PHP 8.1+ for typed static properties
    public string $marca;
    public string $modelo;
    public int $velocidad;

    public function __construct(string $mar, string $mod, int $vel) {
        $this->velocidad = $vel;
        $this->marca = $mar;
        $this->modelo = $mod;
        self::$contador++;
    }

    public static function MostrarVehiculos() {
        return "Hay en total " . self::$contador . " vehiculos en total";
    }
}

class Coche extends Vehiculo {
    public function __construct(string $mar, string $mod, int $vel) {
        parent::__construct($mar, $mod, $vel);
    }
}

class Moto extends Vehiculo {
    public function __construct(string $mar, string $mod, int $vel) {
        parent::__construct($mar, $mod, $vel);
    }
}

$coche=new Coche("Lambo","Diablo",300);
$moto=new Moto("Ducatti","99R",247);
echo $coche->MostrarVehiculos();
?>
