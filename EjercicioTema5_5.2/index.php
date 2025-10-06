<?php
// Punto de entrada principal de la aplicación. Se encargará de interactúar con el controlador y manejar las acciones.

// Incluimos el controlador de préstamos
require_once 'controlador/prestamos_controlador.php';

// Crear una instancia del controlador
$controller = new PrestamosControlador();

// Determinar la acción
$action = $_GET['action'] ?? 'inicio';

// Ejecutar la acción solicitada
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "<h1>Error: Acción no válida</h1>";
}
?>
