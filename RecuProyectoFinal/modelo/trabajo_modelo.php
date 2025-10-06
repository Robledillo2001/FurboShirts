<?php
require_once "modelo/conexion.php";
    class Trabajo{
        private $db;

        public function __construct(){
            $this->db=Conectar::conexion();
        }

        public function registrarfichaje($id_usuario,$tipo){//Metodo para añadir el fichaje en la BSD
            try{
                $this->db->beginTransaction();
                $sql="INSERT INTO fichajes(id_trabajador,fecha_hora,tipo) VALUES(?,NOW(),?)";//Consulta para añadir un fichaje de un trabajador

                $stmt=$this->db->prepare($sql);//Preparar la consulta

                $stmt->execute([$id_usuario,$tipo]);//Ejecutar consulta

                $this->db->commit();//Se guardan los cambios permanentemente
                return "Fichaje Completado";
            }catch(PDOException $e){
                if($this->db->inTransaction()){//Si hay un fallo mientras esta en transaccion
                    $this->db->rollBack();//Se anulan los cambios
                }
                die("Error al fichar".$e->getMessage());
            }
        }

        public function consultarFichajes($inicio,$tamaño){//Metodo para consultar Fichajes e la Base De Datos
            try{
                $sql="SELECT u.img_usuario, f.id, u.NOMBRE_COMPLETO, f.fecha_hora, f.tipo 
                FROM fichajes f 
                INNER JOIN usuarios u ON f.id_trabajador = u.ID
                ORDER BY f.fecha_hora DESC
                LIMIT :inicio, :limite";//Consulta de 2 Tablas

                $stmt=$this->db->prepare($sql);

                //Sacamos los valores de inicio y tamaño
                $stmt->bindValue(':inicio', (int)$inicio, PDO::PARAM_INT);
                $stmt->bindValue(':limite', (int)$tamaño, PDO::PARAM_INT);

                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);//Devolvemos la consulta con los datos generados
            }catch(PDOException $e){
                die("Error en la consulta de Fichajes:".$e->getMessage());
            }
        }

        public function totalFichajes(){//Metodo para ver cuantos fichajes hay en la tabla
            try{
                $sql = "SELECT COUNT(*) AS total FROM fichajes";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);//Devolvemos la consulta con los datos generados
            }catch(PDOException $e){
                die("Error en la cuenta de Fichajes".$e->getMessage());
            }
        }

        public function reportar($id_usuario,$titulo,$desc,$estado='Pendiente'){//Funcion del modelo para añadir Reportes
            try{
                $this->db->beginTRansaction();//Empezar la transaccion

                $sql="INSERT INTO reportes(ID_USUARIO,TITULO,DESCRIPCION,FECHA,ESTADO) VALUES(?,?,?,NOW(),?)";

                $stmt=$this->db->prepare($sql);

                $stmt->execute([$id_usuario,$titulo,$desc,$estado]);//Ejecutar la insercion

                $this->db->commit();//Confirmar los cambios a la base e datos
            }catch(PDOException $e){
                if($this->db->inTransaction()){
                    $this->db->rollBack();//Se borran los datos si hay un error
                }
                die("Error al insertar un reporte".$e->getMessage());
            }
        }

        public function completarReportes($id_reporte){//Funcion para completar todos los reportes de la BSD
            try{
                // Iniciar transacción
                $this->db->beginTransaction();

                // Preparar consulta
                $stmt = $this->db->prepare("UPDATE reportes SET ESTADO = 'completada' WHERE ID = ?");

                // Ejecutar
                $stmt->execute([$id_reporte]);

                // Confirmar transacción
                $this->db->commit();
                return "Reporte Actualizado";
            }catch(PDOException $e){
                if($this->db->inTransaction()){
                    $this->db->rollBack();
                }
                die("Error al actualizar estado de Reporte".$e->getMessage());
            }
        }

        public function estadoReportes($estado="completada"){//Funcion que mira los reportes de la BSD para eliminar
            try{
                $sql="SELECT * FROM reportes WHERE estado=?";
                $stmt=$this->db->prepare($sql);

                $stmt->execute([$estado]);

                return $stmt->fetchAll(PDO::FETCH_ASSOC);//Devuelve un array con los elementos de la consulta
            }catch(PDOException $e){
                die("Error en mostrar los reportes completados".$e->getMessage());
            }
        }

        public function eliminarReportes($id_reporte,$estado="completada"){//Duncion para eliminar tareas por su id y si estan completadas
            try{
                $this->db->beginTransaction();//Empezar nueva transacion
                $sql="DELETE from reportes WHERE ID=? AND ESTADO=?";
                $stmt=$this->db->prepare($sql);

                $stmt->execute([$id_reporte,$estado]);

                $this->db->commit();//Se guardan los cambios en la BSD

                return "Reporte eliminado";
            }catch(PDOException $e){
                if($this->db->inTransaction()){
                    $this->db->rollBack();//Si hay un fallo en una transaccion se eliminan los cambios realizados
                }
                die("Error en eliminar la tarea".$e->getMessage());
            }
        }

        public function verReportes($inicio,$tamaño){//Funcion del modelo para ver Reportes
            try{
                $sql="SELECT r.ID,u.img_usuario,u.NOMBRE_COMPLETO,r.TITULO,r.DESCRIPCION,r.ESTADO,r.FECHA
                    FROM reportes r INNER JOIN usuarios u
                    ON r.ID_USUARIO=u.ID
                    LIMIT :inicio, :limite";

                    $stmt=$this->db->prepare($sql);
                    
                     //Sacamos los valores de inicio y tamaño
                    $stmt->bindValue(':inicio', (int)$inicio, PDO::PARAM_INT);
                    $stmt->bindValue(':limite', (int)$tamaño, PDO::PARAM_INT);

                    $stmt->execute();

                    return $stmt->fetchAll(PDO::FETCH_ASSOC);//Devolvera un array de la consulta
            }catch(PDOException $e){
                die("Error en ver Reportes".$e->getMessage());
            }
        }

        public function totalReportes(){//fUNCION PARA VER EL TOTAL DE REPORTES QUE HAY EN LA BSD
            try{
                $sql="SELECT COUNT(*)AS total from reportes";

                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);//Devolvemos la consulta con los datos generados
            }catch(PDOException $e){
                die("Error en ver total de reportes".$e->getMessage());
            }
        }

        public function verTareas($inicio,$tamaño){//Funcion del controlador para ver Tareas
            try{
                $sql="SELECT t.id,u.img_usuario,u.NOMBRE_COMPLETO,t.titulo,t.estado,t.fecha_asignacion,t.fecha_entrega
                    FROM tareas t INNER JOIN usuarios u
                    ON t.id_trabajador=u.ID
                    LIMIT :inicio, :limite";

                    $stmt=$this->db->prepare($sql);
                    
                     //Sacamos los valores de inicio y tamaño
                    $stmt->bindValue(':inicio', (int)$inicio, PDO::PARAM_INT);
                    $stmt->bindValue(':limite', (int)$tamaño, PDO::PARAM_INT);

                    $stmt->execute();

                    return $stmt->fetchAll(PDO::FETCH_ASSOC);//Devolvera un array de la consulta
            }catch(PDOException $e){
                die("Error en ver Tareas".$e->getMessage());
            }
        }

        public function totalTareas(){//Funcion para el total de Tareas
            try{
                $sql="SELECT COUNT(*)AS total from tareas";

                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);//Devolvemos la consulta con los datos generados
            }catch(PDOException $e){
                die("Error en ver total Tarea".$e->getMessage());
            }
        }

        public function descargarTareas($id_trabajador){//Funcion para sacar todas las tareas de un empleado y mostrarlas en un PDF
            try{
                $sql="SELECT * FROM tareas WHERE id_trabajador=?";
                $stmt=$this->db->prepare($sql);

                $stmt->execute([$id_trabajador]);

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                die("Error en Consultar todas las tareas del empleado".$e->getMessage());
            }
        }

        public function añadirTarea($id_emp, $titulo, $desc, $estado, $fecha_asignacion, $fecha_entrega) {//Metodo para añadir las tareas
            try {
                $this->db->beginTransaction();//Iniciar transaccion para modificar datos de la BSD
                $sql = "INSERT INTO tareas (id_trabajador, titulo, descripcion, estado, fecha_asignacion, fecha_entrega) 
                        VALUES (?, ?, ?, ?, ?, ?);";
        
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$id_emp, $titulo, $desc, $estado, $fecha_asignacion, $fecha_entrega]);
                $this->db->commit();
            } catch (PDOException $e) {
                if ($this->db->inTransaction()) {
                    $this->db->rollBack();
                }
                die("Error en insertar Tarea: " . $e->getMessage());
            }
        }

        public function eliminarTarea($id_tarea,$estado="completada"){//Duncion para eliminar tareas por su id y si estan completadas
            try{
                $this->db->beginTransaction();//Empezar nueva transacion
                $sql="DELETE from tareas WHERE id=? AND estado=?";
                $stmt=$this->db->prepare($sql);

                $stmt->execute([$id_tarea,$estado]);

                $this->db->commit();//Se guardan los cambios en la BSD

                return "Tarea eliminada";
            }catch(PDOException $e){
                if($this->db->inTransaction()){
                    $this->db->rollBack();//Si hay un fallo en una transaccion se eliminan los cambios realizados
                }
                die("Error en eliminar la tarea".$e->getMessage());
            }
        }

        public function tareasSegunEstado($estado="completada"){//Funcion para mostrar las tareas completadas para eliminarlas que por defecto las mostrara completadas
            try{
                $sql="SELECT * FROM tareas WHERE estado=?";
                $stmt=$this->db->prepare($sql);

                $stmt->execute([$estado]);

                return $stmt->fetchAll(PDO::FETCH_ASSOC);//Devuelve un array con los elementos de la consulta
            }catch(PDOException $e){
                die("Error en mostrar las tareas completadas".$e->getMessage());
            }
        }
        
        public function tareasEmp($id_user, $inicio, $tamaño){//Metodo para ver las tareas por el ID de usuario
            try{
                $sql = "SELECT * FROM tareas 
                        WHERE id_trabajador = ? 
                        LIMIT ?, ?";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(1, (int)$id_user, PDO::PARAM_INT);
                $stmt->bindValue(2, (int)$inicio, PDO::PARAM_INT);
                $stmt->bindValue(3, (int)$tamaño, PDO::PARAM_INT);

                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);//Devuelve el array de la consulta
            }catch(PDOException $e){
                die("Error en la consulta de tareas".$e->getMessage());
            }
        }

        public function totalTareasEmp($id_user){//Total de Tareas por empleado
            try {
                $sql = "SELECT COUNT(*) AS total
                        FROM tareas 
                        WHERE id_trabajador = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$id_user]);
                $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                return (int) $fila['total'];
            } catch (PDOException $e) {
                die("Error en la consulta de totalTareasEmp: " . $e->getMessage());
            }
        }

        public function actualizarTareas($ids){//Metodo para actualizar las tareas segun Empleado
            if (empty($ids)) {
                return "No se seleccionaron tareas.";
            }
            $placeholders = implode(',', array_fill(0, count($ids), '?'));//Crea un string con un separador (,) del array de las tareas seleccionadas a actualizarse con un marcador ? en cada una
        
            try {
                $this->db->beginTransaction();
        
                // estado está fijo, no necesita placeholder
                $sql = "UPDATE tareas
                        SET estado = 'completada'
                        WHERE id IN ($placeholders)";
                $stmt = $this->db->prepare($sql);
        
                // Solo enlazamos los IDs (posicionales desde 1 hasta N)
                foreach ($ids as $i => $id) {
                    $stmt->bindValue($i + 1, (int)$id, PDO::PARAM_INT);
                }
        
                $stmt->execute();
                $this->db->commit();
        
                return "Tareas marcadas como completadas.";
            } catch (PDOException $e) {
                if ($this->db->inTransaction()) {
                    $this->db->rollBack();
                }
                die("Error en la actualización de estado: " . $e->getMessage());
            }
        }

        public function verUsuarios(){//Metodo para ver usuarioss
            try{
                $sql="SELECT * FROM usuarios WHERE rol=? ORDER BY ID ASC";//Consulta para ver los usuarios por ID
                $stmt=$this->db->prepare($sql);

                $stmt->execute(["usuario"]);

                $usuarios=$stmt->fetchAll(PDO::FETCH_ASSOC);

                return($usuarios);
            }catch(PDOException $e){
                die("Error en insertar Tarea".$e->getMessage());
            }
        }
    }
?>