<?php
    require_once "conexion.php";
    class Alquiler{
        private $db;

        public function __construct(){
            $this->db=Conectar::conexion();
        }

        public function obtenerAlquileres(){//obtendremos los datos de la consulta de todos los vehiculos alquilados
            $sql="SELECT 
                    a.id_alquiler,
                    c.nombre AS cliente_nombre,
                    v.marca AS vehiculo_marca,
                    v.modelo AS vehiculo_modelo,
                    a.fecha_inicio,
                    a.fecha_fin,
                    a.total
                FROM 
                    alquileres a
                INNER JOIN 
                    clientes c ON a.id_cliente = c.id_cliente
                INNER JOIN 
                    vehiculos v ON a.id_vehiculo = v.id_vehiculo
                ";
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);//Devolvera un array que lo recorreremos en la vistacon uina tabla
        }

        public function devolverVehiculo($id_alquiler,$id_vehiculo){//Pasamos el alquiler y el vehiculo por parametro
            $sql="DELETE FROM alquileres WHERE id_alquiler=? AND id_vehiculo=?";//Borramos el alquiler por id alquiler y id vehiculo
            $stmt=$this->db->prepare($sql);
            $stmt->execute([$id_alquiler,$id_vehiculo]);

            $sql="UPDATE vehiculos SET ejemplares=ejemplares+1 WHERE id_vehiculo=?";//Si se devuelve un vehiculo se suma un ejemplar
            $stmt=$this->db->prepare($sql);
            $stmt->execute([$id_vehiculo]);
        }

        public function alquilarVehiculo($id_vehiculo, $id_cliente, $fechaFinal) {
            $sql="SELECT precio_diario FROM vehiculos WHERE id_vehiculo=?";
            $stmt=$this->db->prepare($sql);
            $stmt->execute([$id_vehiculo]);

            $precioDia=$stmt->fetch(PDO::FETCH_ASSOC)['precio_diario'];//Precio diario de la consulta del coche por el id_vehiuclo
            // Calcular la fecha de inicio (hoy)
            $fechaInicio = new DateTime();
        
            // Convertir la fecha final a un objeto DateTime
            $fechaFinal = new DateTime($fechaFinal);
        
            // Calcular la diferencia en días
            $interval = $fechaInicio->diff($fechaFinal);
            $diasDeAlquiler = $interval->days;
        
            // Calcular el precio total
            $total = $diasDeAlquiler * $precioDia;
        
            // Crear la consulta SQL para insertar el alquiler
            $sql = "INSERT INTO alquileres(id_cliente, id_vehiculo, fecha_inicio, fecha_fin, total) VALUES(?,?,?,?,?)";
            $stmt = $this->db->prepare($sql);
            // Ejecutar la consulta con los parámetros necesarios
            $stmt->execute([$id_cliente, $id_vehiculo, $fechaInicio->format('Y-m-d'), $fechaFinal->format('Y-m-d'), $total]);

            $sql="UPDATE vehiculos SET ejemplares=ejemplares-1 WHERE id_vehiculo=?";
            $stmt=$this->db->prepare($sql);
            $stmt->execute([$id_vehiculo]);
        }
    }
?>