<?php
session_start(); // Iniciamos la sesión para poder usar variables de sesión

abstract class Vehiculo {
    public $marca;
    public $modelo;
    public $matricula;
    public $tarifa;

    public static int $contador = 0; // Contador estático para asignar IDs únicos
    protected static array $vehiculos = []; // Array estático que guarda todas las instancias

    private $id; // ID único para cada vehículo

    public function __construct($mar, $mod, $mat, $tar) {
        // Asignamos propiedades pasadas al constructor
        $this->marca = $mar;
        $this->modelo = $mod;
        $this->matricula = $mat;
        $this->tarifa = $tar;

        // Incrementamos contador y asignamos el ID actual
        self::$contador++;
        $this->id = self::$contador;

        // Guardamos esta instancia en el array estático
        self::$vehiculos[] = $this;
    }

    // Método abstracto que debe implementar cada subclase para calcular la tarifa
    abstract function calcularTarifa(int $horas = 0);

    // Método que devuelve una fila HTML con los datos del vehículo
    public function mostrarVehiculos() {
        return "<tr>
                <td>" . $this->id . "</td>
                <td>" . htmlspecialchars($this->marca) . "</td>
                <td>" . htmlspecialchars($this->modelo) . "</td>
                <td>" . htmlspecialchars($this->matricula) . "</td>
                <td>" . $this->calcularTarifa() . "</td>
            </tr>";
    }

    // Método estático para mostrar la tabla completa con todos los vehículos
    public static function mostrarTabla() {
        echo "<table border='1' cellpadding='5' cellspacing='0'>
                <tr>
                    <th>ID</th><th>Marca</th><th>Modelo</th><th>Matrícula</th><th>Tarifa</th>
                </tr>";
        // Recorremos el array de vehículos para mostrar cada uno
        foreach (self::$vehiculos as $vehiculo) {
            echo $vehiculo->mostrarVehiculos();
        }
        echo "</table>";
        echo "<p>Total Vehículos: " . self::$contador . "</p>";
    }

    // Carga los vehículos almacenados en sesión y los unserializa
    public static function cargarVehiculos() {
        if (isset($_SESSION['vehiculos_serializados'])) {
            self::$vehiculos = unserialize($_SESSION['vehiculos_serializados']);
            self::$contador = count(self::$vehiculos); // Ajustamos el contador
        }
    }

    // Guarda el array de vehículos serializado en la sesión
    public static function guardarVehiculos() {
        $_SESSION['vehiculos_serializados'] = serialize(self::$vehiculos);
    }
}

// Subclase Coche, implementa el cálculo de tarifa para coches
class Coche extends Vehiculo {
    public function calcularTarifa(int $horas = 5) {
        return $this->tarifa * $horas;
    }
}

// Subclase Moto, tarifa distinta y horas distintas
class Moto extends Vehiculo {
    public function calcularTarifa(int $horas = 2) {
        return $this->tarifa * $horas;
    }
}

// Subclase Camion con su propia tarifa y horas
class Camion extends Vehiculo {
    public function calcularTarifa(int $horas = 10) {
        return $this->tarifa * $horas;
    }
}

// Cargamos los vehículos previamente guardados en sesión (si hay)
Vehiculo::cargarVehiculos();

// Si el formulario fue enviado, procesamos los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'] ?? '';
    $marca = trim($_POST['marca'] ?? '');
    $modelo = trim($_POST['modelo'] ?? '');
    $matricula = trim($_POST['matricula'] ?? '');
    $tarifa = floatval($_POST['tarifa'] ?? 0);

    // Validamos que los datos no estén vacíos y tarifa sea mayor que cero
    if ($marca !== '' && $modelo !== '' && $matricula !== '' && $tarifa > 0) {
        // Según el tipo de vehículo, creamos la instancia correspondiente
        switch ($tipo) {
            case 'coche':
                new Coche($marca, $modelo, $matricula, $tarifa);
                break;
            case 'moto':
                new Moto($marca, $modelo, $matricula, $tarifa);
                break;
            case 'camion':
                new Camion($marca, $modelo, $matricula, $tarifa);
                break;
        }
        // Guardamos la lista actualizada en sesión
        Vehiculo::guardarVehiculos();

        // Redirigimos para evitar reenvío accidental del formulario
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        // Mensaje de error simple si hay datos inválidos
        echo "<p style='color:red;'>Por favor, rellena todos los campos correctamente.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Gestión de Vehículos</title>
</head>
<body>
    <h2>Añadir Vehículo</h2>
    <!-- Formulario para añadir vehículos -->
    <form method="post" action="">
        <label for="tipo">Tipo:</label><br />
        <select name="tipo" id="tipo" required>
            <option value="coche">Coche</option>
            <option value="moto">Moto</option>
            <option value="camion">Camión</option>
        </select><br /><br />

        <label for="marca">Marca:</label><br />
        <input type="text" id="marca" name="marca" required /><br /><br />

        <label for="modelo">Modelo:</label><br />
        <input type="text" id="modelo" name="modelo" required /><br /><br />

        <label for="matricula">Matrícula:</label><br />
        <input type="text" id="matricula" name="matricula" required /><br /><br />

        <label for="tarifa">Tarifa (por hora):</label><br />
        <input type="number" id="tarifa" name="tarifa" step="0.01" min="0.01" required /><br /><br />

        <button type="submit">Agregar Vehículo</button>
    </form>

    <h2>Listado de Vehículos</h2>
    <?php Vehiculo::mostrarTabla(); // Mostrar tabla con todos los vehículos ?>
</body>
</html>
