<?php
    require_once "conexion.php";
    class Cliente{
        private $db;

        public function __construct(){
            $this->db=Conectar::conexion();
        }

        public function obtenerClientes(){
            $sql="SELECT * FROM clientes ORDER BY id_cliente";
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);//Sacara los clientes de la consulta
        }
    }
?>