<?php
    require_once "conexion.php";
    class Coche{
        private $db;

        public function __construct(){
            $this->db=Conectar::conexion();
        }

        public function obtenerCoches(){
            $sql="SELECT * FROM coches ORDER BY id ASC";
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);//Sacara todos loa vehiculos de la consulta
        }

        public function obtenerCochesPag($inicio, $limite){
            $sql = "SELECT * FROM coches ORDER BY id ASC LIMIT :limite OFFSET :inicio";
            $stmt = $this->db->prepare($sql);
        
            $stmt->bindValue(":inicio", intval($inicio), PDO::PARAM_INT);
            $stmt->bindValue(":limite", intval($limite), PDO::PARAM_INT);
        
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        

        public function contarCoches(){
            $sql = "SELECT COUNT(*) as total FROM coches";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado['total']; // Devuelve el total de coches
        }
        

        public function obtenerDatos($id){
            $sql="SELECT * FROM coches WHERE id=?";
            $stmt=$this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>