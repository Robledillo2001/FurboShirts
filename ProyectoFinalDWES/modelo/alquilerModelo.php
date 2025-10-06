<?php
    require_once "conexion.php";
    class Alquiler{
        private $db;

        public function __construct(){
            $this->db=Conectar::conexion();
        }

        public function obtenerAlquileres($inicio, $limite) {
            try {
                $sql = "SELECT a.id, u.NOMBRE AS cliente, c.marca, c.modelo, 
                               a.fecha_inicio, a.fecha_fin, a.precio_total, c.ruta
                        FROM alquileres a 
                        INNER JOIN usuarios u ON a.id_usuario = u.ID
                        INNER JOIN coches c ON a.id_coche = c.id
                        ORDER BY a.id ASC
                        LIMIT :limite OFFSET :inicio";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(":inicio", $inicio, PDO::PARAM_INT);
                $stmt->bindValue(":limite", $limite, PDO::PARAM_INT);
        
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Error en la consulta: " . $e->getMessage());
            }
        }
        

        public function contarAlquileres(){//Contar los alquileres disponibles para la paginacion
            try{
                $sql="SELECT COUNT(*)as total FROM alquileres";
                $stmt=$this->db->query($sql);

                return (int)$stmt->fetch(PDO::FETCH_ASSOC)['total'];
            }catch(PDOException $e){
                die("Error al contar alquileres: ".$e->getMessage());
            }
        }

        public function obtenerFechaFinal($id_alq,$id_coche,$id_usuario){//Metodo para obtener la fecha final del alquiler para devolverlo y mandarlo a un correo
            $sql="SELECT * FROM alquileres WHERE id=? and id_coche=? and id_usuario=?";
            $stmt=$this->db->prepare($sql);
            $stmt->execute([$id_alq,$id_coche,$id_usuario]);
                
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function devolverCoche($id_alquiler,$id_coche,$id_usuario){//Pasamos el alquiler y el vehiculo por parametro
           try{
                $this->db->beginTransaction();

                $sql="DELETE FROM alquileres WHERE id=? AND id_coche=? AND id_usuario=?";
                $stmt=$this->db->prepare($sql);

                $stmt->execute([$id_alquiler,$id_coche,$id_usuario]);

                $sql="UPDATE coches SET cantidad=cantidad+1 WHERE id=?";
                $stmt=$this->db->prepare($sql);

                $stmt->execute([$id_coche]);

                $this->db->commit();
           }catch(PDOException $e){
                if($this->db->inTransaction()){
                    $this->db->rollBack();
                    die("Error al alquilar Vehiculo ".$e->getMessage());
                }
           }
        }

        public function alquilarCoche($id_coche, $id_usuario, $fechaFinal) {
            try {
                $this->db->beginTransaction();
        
                // Obtener información del coche
                $sql = "SELECT * FROM coches WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$id_coche]);
        
                $fila = $stmt->fetch(PDO::FETCH_ASSOC); // Solo necesitamos un registro
        
                if (!$fila) {
                    throw new Exception("Coche no encontrado.");
                }
        
                $precioDia = $fila['precio'];
                $fecha_inicio = new DateTime();
                $fecha_fin = new DateTime($fechaFinal);
        
                // Validación de fechas
                if ($fecha_fin <= $fecha_inicio) {
                    return "<h2 style='color:red;'>No se puede usar una fecha anterior o igual a la de hoy.<h2>";
                }
        
                // Calcular la diferencia de días
                $calculoFechas = $fecha_inicio->diff($fecha_fin);
                $dias = $calculoFechas->days;
        
                if($dias>1){//Si los dias son mayor a uno sacara el precio* los dias
                    $precioTotal = $precioDia * $dias;
                }else{//Si no el precio total solo sera al precio diario
                    $precioTotal = $precioDia;
                }
        
                // Insertar el alquiler
                $sql = "INSERT INTO alquileres (id_usuario, id_coche, fecha_inicio, fecha_fin, precio_total)
                        VALUES (?, ?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    $id_usuario,
                    $id_coche,
                    $fecha_inicio->format('Y-m-d'),
                    $fecha_fin->format('Y-m-d'),
                    $precioTotal
                ]);
        
                // Actualizar la cantidad de coches (restar 1 porque se ha alquilado uno)
                $sql = "UPDATE coches SET cantidad = cantidad - 1 WHERE id = ? AND cantidad > 0";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$id_coche]);
        
                if ($stmt->rowCount() === 0) {
                    throw new Exception("No hay coches disponibles para alquilar.");
                }
        
                $this->db->commit();
                return "Precio total: $precioTotal €";
            } catch (PDOException $e) {
                if ($this->db->inTransaction()) {
                    $this->db->rollBack();
                }
                die("Error al alquilar vehículo: " . $e->getMessage());
            } 
        }
        public function añadirCoches($marca, $modelo, $anio, $precio, $cantidad, $imagenBinaria,$ruta) {
            try {
                $this->db->beginTransaction();
                $sql = "INSERT INTO coches(marca, modelo, anio, precio, cantidad, imagen, ruta) VALUES(?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(1, $marca);//Se usara bindParam para pasar por parametro luego la imagen
                $stmt->bindParam(2, $modelo);
                $stmt->bindParam(3, $anio);
                $stmt->bindParam(4, $precio);
                $stmt->bindParam(5, $cantidad);
                $stmt->bindParam(6, $imagenBinaria, PDO::PARAM_LOB); // Guardar como LOB (Large Object)
                $stmt->bindParam(7, $ruta);
                $stmt->execute();
                $this->db->commit();
            } catch (PDOException $e) {
                if ($this->db->inTransaction()) {
                    $this->db->rollBack();
                }
                die("Error al añadir vehículo: " . $e->getMessage());
            }
        }

        public function borrarCoches($id_coche){//Buscamos el coche que queremos borrar por marca y modelo
            try{
                $this->db->beginTransaction();
                $sql="DELETE FROM coches WHERE id=?";
                $stmt=$this->db->prepare($sql);

                $stmt->execute([$id_coche]);//Ejecutamos la consulta con los valores de la funcion

                $this->db->commit();
            }catch(PDOException $e){
                if($this->db->inTransaction()){
                    $this->db->rollBack();
                }
                die("Error en la eliminacion del buga: ".$e->getMessage());
            }
        }

        public function obtenerIdAlquiler(){
            $sql="SELECT id FROM alquileres ORDER BY ID DESC LIMIT 1";
            $stmt=$this->db->prepare($sql);
            $stmt->execute();

            return $stmt->fetchColumn();
        }
        
        public function añadirCookies($coche){//Funcion de agregar cookies
            $nombre="Alquiler_".$_SESSION['usuario'];
            setcookie($nombre,$coche,time()+60,"/");
        }
    }
?>