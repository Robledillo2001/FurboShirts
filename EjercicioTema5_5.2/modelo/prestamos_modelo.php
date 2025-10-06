<?php
//Modelo PrestamosModelo: Gestiona las operaciones relacionadas con la tabla `prestamos`.

require_once 'conectar.php';

class PrestamosModelo {
    private $db;

    public function __construct() {
        $this->db = Conectar::conexion();
    }

    //Método para obtener el historial de préstamos. Devolvemos array Lista de préstamos con detalles.
     
    public function obtenerHistorial() {
        $sql = "SELECT p.id_prestamo, u.nombre AS usuario, l.titulo AS libro, p.fecha_prestamo
                FROM prestamos p
                INNER JOIN usuarios u ON p.id_usuario = u.id_usuario
                INNER JOIN libros l ON p.id_libro = l.id_libro";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para registrar un nuevo préstamo. Recibimos como parametros: ID del usuario y $idLibro ID del libro.
    
    public function registrarPrestamo($idUsuario, $idLibro) {
        $sql = "INSERT INTO prestamos (id_usuario, id_libro, fecha_prestamo) VALUES (?, ?, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idUsuario, $idLibro]);
    }

    // Método para registrar la devolución de un préstamo. Pasamos como parametro ID del préstamo.

    public function registrarDevolucion($idPrestamo) {
        $sql = "DELETE FROM prestamos WHERE id_prestamo = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idPrestamo]);
    }
}
?>
