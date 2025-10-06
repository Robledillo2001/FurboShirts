<?php
    require_once "conexion.php";
    class Vehiculo{
        private $db;

        public function __construct(){
            $this->db=Conectar::conexion();
        }

        public function obtenerVehiculos(){
            $sql="SELECT * FROM vehiculos ORDER BY id_vehiculo";
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);//Sacara todos loa vehiculos de la consulta
        }
    }
?>