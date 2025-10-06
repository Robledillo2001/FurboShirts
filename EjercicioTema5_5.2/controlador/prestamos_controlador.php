<?php
//Clase PrestamosControlador:Controlador para gestionar las operaciones relacionadas con préstamos.

require_once 'modelo/prestamos_modelo.php'; // Incluir el modelo de préstamos
require_once 'modelo/libros_modelo.php'; // Incluir el modelo de libros
require_once 'modelo/usuarios_modelo.php'; // Incluir el modelo de usuarios

class PrestamosControlador {
    
    public function inicio() {
        // Incluir la vista y pasar los datos
        require_once 'vista/home.php';
    }

    //Método para mostrar el historial de préstamos.
 
    public function historial() {
        // Instanciar el modelo de préstamos
        $modelo = new PrestamosModelo();

        // Obtener el historial de préstamos
        $prestamos = $modelo->obtenerHistorial();

        // Incluir la vista y pasar los datos
        require_once 'vista/historial.php';
    }

    // Método para registrar un nuevo préstamo.
    
    public function registrarPrestamo() {
        // Crear instancias de los modelos
        $librosModelo = new LibrosModelo();
        $usuariosModelo = new UsuariosModelo();
    
        // Manejar el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idUsuario = $_POST['id_usuario'];
            $idLibro = $_POST['id_libro'];
    
            // Instanciar el modelo de préstamos y registrar el préstamo
            $modelo = new PrestamosModelo();
            $modelo->registrarPrestamo($idUsuario, $idLibro);
    
            // Redirigir al historial
            header("Location: index.php?action=historial");
            exit;
        }
    
        // Obtener usuarios y libros para los desplegables que usamos en la vista registrar.php
        $usuarios = $usuariosModelo->obtenerUsuarios();
        $libros = $librosModelo->obtenerLibros();
    
        // Pasar los datos a la vista
        require_once 'vista/registrar.php';
    }

    // Método para registrar la devolución de un préstamo.
    
    public function devolver() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener datos del formulario
            $idPrestamo = $_POST['id_prestamo'];

            // Instanciar el modelo de préstamos
            $modelo = new PrestamosModelo();

            // Registrar la devolución
            $modelo->registrarDevolucion($idPrestamo);

            // Redirigir al historial
            header("Location: index.php");
            exit;
        }

        // Mostrar la vista del formulario para devolver un préstamo
        require_once 'vista/devolver.php';
    }
}
?>
