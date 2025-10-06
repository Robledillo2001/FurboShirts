<?php
    require_once "controlador/alquiler_controlador.php";
    require_once "controlador/login_controlador.php";

    // Mapeo de acciones a controladores
    $controladores = [
        'inicio' => new AlquilerControlador(),
        'historial' => new AlquilerControlador(),
        'alquilarCoche' => new AlquilerControlador(),
        'devolverCoche' => new AlquilerControlador(),
        'comprobarLogin' => new LoginControlador(),
        'eliminarUsuarios'=>new LoginControlador(),
        'agregarUsuarios'=>new LoginControlador(),
        'registrarse'=>new LoginControlador(),
        'cambiarNombre'=>new LoginControlador(),
        'verUsuarios'=>new LoginControlador(),
        'cambiarContraseña'=>new LoginControlador(),
        'añadirCoche'=>new AlquilerControlador(),
        'borrarCoche'=>new AlquilerControlador(),
        'verCoches'=>new AlquilerControlador()
    ];

    // Obtener acción desde la URL, si no está definida usar 'inicio' por defecto
    $action = $_GET['action'] ?? 'inicio';
    
    // Comprobar si la acción existe en el mapeo y si el método está definido en la clase correspondiente
    if (isset($controladores[$action]) && method_exists($controladores[$action], $action)) {
        $controladores[$action]->$action();
    } else {
        echo "<h2>Acción no válida: $action</h2>";
    }
?>
