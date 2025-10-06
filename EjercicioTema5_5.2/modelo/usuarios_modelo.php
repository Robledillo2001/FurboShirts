<?php
// Modelo UsuariosModel: Gestiona las operaciones relacionadas con la tabla `usuarios`.
 
require_once 'conectar.php';

class UsuariosModelo {
    private $db;

    public function __construct() {
        $this->db = Conectar::conexion();
    }

    // Metodo para obtener todos los usuarios registrados. Devuelve array Lista de usuarios.
    
    public function obtenerUsuarios() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
