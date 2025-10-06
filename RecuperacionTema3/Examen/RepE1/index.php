<?php
class Sesion {
    public function CrearSesion() {
        if (session_status() === PHP_SESSION_NONE) { // Verifica si la sesión no está activa
            session_start();
            return "Sesion Iniciada";
        }
    }

    public function CerrarSesion() {
        if (session_status() === PHP_SESSION_ACTIVE) { // Verifica si la sesión está activa
            session_destroy();
            $_SESSION = []; // Limpia los datos de sesión
            return "Sesion Cerrada";
        }
    }

    public function AñadirElemento($elemento, $valor) {
        $_SESSION[$elemento] = $valor;
    }

    public function devolverElemento($elemento) {
        return isset($_SESSION[$elemento]) ? $_SESSION[$elemento] : null;
    }

    public function borrarElemento($elemento) {
        unset($_SESSION[$elemento]);
    }
}

    $sesion = new Sesion();

    // Crear sesión
    echo $sesion->CrearSesion()."<br>";

    // Añadir elemento a la sesión
    $sesion->AñadirElemento("numero", 5);

    // Devolver y mostrar el elemento
    echo "Elemento añadido: " . $sesion->devolverElemento("numero") . "<br>";

    // Borrar el elemento
    $sesion->borrarElemento("numero");

    // Intentar devolver el elemento eliminado
    echo "Elemento tras borrarlo: " . $sesion->devolverElemento("numero") . "<br>";

    // Cerrar la sesión
    echo $sesion->CerrarSesion()."<br>";
?>
