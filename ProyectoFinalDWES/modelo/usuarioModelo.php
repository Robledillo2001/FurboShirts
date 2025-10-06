<?php
    require_once "conexion.php";
    class Usuario{
        private $db;

        public function __construct(){
            $this->db=Conectar::conexion();
        }

        public function obtenerUsuarios(){
            $sql="SELECT * FROM usuarios ORDER BY ID ASC";
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);//Sacara los clientes de la consulta
        }

        public function obtenerAdmin(){
            $sql="SELECT * FROM administradores ORDER BY ID ASC";
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);//Sacara los clientes de la consulta
        }

        public function obtenerUsuariosYAdmins($inicio, $limite) {
            $sql = "
                SELECT ID, NOMBRE, correo_electronico, 'usuario' AS rol FROM usuarios
                UNION ALL
                SELECT ID, NOMBRE, '' AS correo_electronico, 'admin' AS rol FROM administradores
                ORDER BY ID ASC
                LIMIT :limite OFFSET :inicio
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":inicio", $inicio, PDO::PARAM_INT);
            $stmt->bindParam(":limite", $limite, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function contarUsuariosYAdmins() {
            $sql = "SELECT 
                        (SELECT COUNT(*) FROM usuarios) + (SELECT COUNT(*) FROM administradores) AS total";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        }
    }
?>