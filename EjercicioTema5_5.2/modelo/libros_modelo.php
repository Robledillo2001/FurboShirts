<?php
// Modelo LibrosModel: Gestiona las operaciones relacionadas con la tabla `libros`.

require_once 'conectar.php';

class LibrosModelo {
    private $db;

    public function __construct() {
        $this->db = Conectar::conexion();
    }

    //Método para obtener todos los libros disponibles. Devolviendo un array con la lista de libros
     
    public function obtenerLibros() {
        $sql = "SELECT * FROM libros";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
