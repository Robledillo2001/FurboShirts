<?php
    require_once "conexion.php";
    class Usuarios{
        private $db;
        public function __construct(){
            $this->db=Conectar::conexion();
        }

        public function login($nombre,$contraseña){
            try{
                $sql="SELECT * FROM usuarios WHERE NOMBRE_USUARIO=?";//Consulta que busca los usuarios por el nombre de usuario

                $consulta=$this->db->prepare($sql);//Consulta preparada

                $consulta->execute([$nombre]);//Ejecutar consulta

                // Obtener el resultado como array asociativo
                $usuario = $consulta->fetch(PDO::FETCH_ASSOC);//Array con los valores de la consulta

                if ($usuario) {//Si el array contiene elementos
                    // Acceder al hash almacenado correctamente
                    $hash = $usuario['CONTRASEÑA'];
                    
                    if (password_verify($contraseña, $hash)) {//Si la contraseña es igual a la hasheada
                        return $usuario; // Devolver datos del usuario
                    }
                }
                
                return false;
            }catch(PDOException $E){
                die("Error en el inicio de sesion:".$E->getMessage());
            }
        }

        public function verUsuarios($inicio,$tamaño){//Funcion para ver a los usuarios con paginacion
            try{
                $sql="SELECT * FROM usuarios
                LIMIT :inicio, :limite";//Ponemos u limite desde el inicio hasta el tamaño de la pagina
                $stmt=$this->db->prepare($sql);

                //Sacamos los valores de inicio y tamaño
                $stmt->bindValue(':inicio', (int)$inicio, PDO::PARAM_INT);
                $stmt->bindValue(':limite', (int)$tamaño, PDO::PARAM_INT);

                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);//Devolvemos el array de la consulta
            }catch(PDOException $e){
                die("Error al mostrar a los usuarios".$e->getMessage());
            }
        }

        public function totalUsuarios(){//Funcion para ver el total de los usuarios
            try{
                $sql="SELECT COUNT(*)AS total from usuarios";

                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);//Devolvemos la consulta con los datos generados
            }catch(PDOException $e){
                die("Error en ver total usuarios".$e->getMessage());
            }
        }

        public function añadirUsuarios($usuario,$nombre,$apellido,$dni,$contraseña,$rol,$correo,$ruta=""){//Metodo para añadir Usuarios a la BSD ruta por defecto vacia por si no se pone una imagen
            try{
                $nombreCompleto=$nombre." ".$apellido;//Variable para meter el nombre completo
                $sql="SELECT * FROM usuarios
                    WHERE NOMBRE_USUARIO=? 
                    OR NOMBRE_COMPLETO=? OR DNI=?
                    OR CORREO=?";//Consulta para comprobar que el usuario existe

                $comprobarUser=$this->db->prepare($sql);
                $comprobarUser->execute([$usuario,$nombreCompleto,$dni,$correo]);
                
                if($comprobarUser->rowCount()>0){//Si devuelve alguna fila nos mostrara un mensaje
                    return "El usuario no se puede insertar porque ya exsite";
                }else{//Si no evuelve filas lo insertara en la BSD
                    $this->db->beginTransaction();//Empezar transaccion

                    $sql="INSERT INTO usuarios(NOMBRE_USUARIO,NOMBRE_COMPLETO,DNI,CONTRASEÑA,rol,correo,img_usuario) 
                        VALUES(?,?,?,?,?,?,?)";//Insertar los usuarios
                    $insertarUser=$this->db->prepare($sql);
                    $hash=password_hash($contraseña,PASSWORD_DEFAULT);//Hasheamos la contraseña

                    $insertarUser->execute([$usuario,$nombreCompleto,$dni,$hash,$rol,$correo,$ruta]);
                    $this->db->commit();//Confirmar cambios de la BSD

                    return "Usuario insertado Correctamente";
                }
            }catch(PDOException $E){
               if($this->db->inTransaction()){//Se esta en una Transaccion
                $this->db->rollBack();//Se eliminan los cambios
               }
               die("Error en la inserccion de Usuarios". $E->getMessage());
            }
        }

        public function modificarImgUsuario($ruta,$id_usuario){//Metodo para cambiar la imagen de usuario pasando id de usuario y ruta del archivo
            try{
                $this->db->beginTransaction();
                $sql = "UPDATE usuarios SET img_usuario = :ruta WHERE ID = :id";//Consulta que actualiza la ruta de la imagen por id de usuario

                $stmt = $this->db->prepare($sql);
                //Parametros de la consulta
                $stmt->bindParam(':ruta', $ruta, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id_usuario, PDO::PARAM_INT);
                
                $stmt->execute();
                $this->db->commit();

                // Confirmar que se guardó y devolver el nuevo valor (opcional)
                $sql = "SELECT img_usuario FROM usuarios WHERE ID = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id', $id_usuario, PDO::PARAM_INT);
                $stmt->execute();

                $imagen = $stmt->fetch(PDO::FETCH_ASSOC);

                return $imagen['img_usuario'];//Devolvemos la ruta de la imagen del usuario
            }catch(PDOException $e){
                if($this->db->inTransaction()){
                    $this->db->rollBack();//Si hay un fallo en una transaccion se eliminan los cambios realizados
                }
                die("Error en cambiar la imagen".$e->getMessage());
            }
        }

        public function eliminarUsuario($id_usuario){//Funcion para eliminar usuarios
            try{
                $this->db->beginTransaction();//Empezar nueva transacion
                $sql="DELETE from usuarios WHERE ID=?";
                $stmt=$this->db->prepare($sql);

                $stmt->execute([$id_usuario]);

                $this->db->commit();//Se guardan los cambios en la BSD

                return "Usuario eliminado";
            }catch(PDOException $e){
                if($this->db->inTransaction()){
                    $this->db->rollBack();//Si hay un fallo en una transaccion se eliminan los cambios realizados
                }
                die("Error en eliminar la tarea".$e->getMessage());
            }
        }

        public function cambiarNombre($id_usuario,$nombre){//Funcion que cambiara el nombre de usuario
            try{
                $this->db->beginTransaction();//Empezar transaccion
                $sql="UPDATE usuarios
                    set NOMBRE_USUARIO=?
                    WHERE ID=?";
                
                $stmt=$this->db->prepare($sql);
                $stmt->execute([$nombre,$id_usuario]);//Ejecutar actualizacion

                $this->db->commit();//Se guardan los cambios
                return "Nombre cambiado con exito";
            }catch(PDOException $e){
                if($this->db->inTransaction()){//Si esta en una transaccion
                    $this->db->rollBack();//Se revierten los cambios
                }
                die("Error al cambiar el nombre".$e->getMessage());
            }
        }

        public function cambiarContraseña($id_usuario,$contraseña_actual,$contraseña_nueva){//Metodo para cambiar la contraseña
            try{
                $sql="SELECT CONTRASEÑA FROM usuarios WHERE ID=?";//Primero hacemos una consulta para pillar la contraseña hasheada
                $stmt=$this->db->prepare($sql);
                
                $stmt->execute([$id_usuario]);//Ejecutamos consulta

                $contraseña_hash=$stmt->fetch(PDO::FETCH_ASSOC);//Array con el valor de la contraseña anterior del usuario

                if(password_verify($contraseña_actual,$contraseña_hash['CONTRASEÑA'])){//Si le pasamos bien la contraseña anterior
                    $this->db->beginTransaction();//Empezar transaccion

                    $sql="UPDATE usuarios set CONTRASEÑA=? WHERE ID=?";//Actualizamos la contraseña
                    $stmt=$this->db->prepare($sql);

                    $stmt->execute([$contraseña_nueva,$id_usuario]);//Ejecutamos la consulta
                    $this->db->commit();//Guardamos los cambios
                    return "Contraseña cambiada";
                }else{
                    return "La contraseña actual no es correcta";
                }
            }catch(PDOException $e){
                if($this->db->inTransaction()){
                    $this->db->rollBack();//Se borran los cambios
                }
                die("Error al cambiar la contraseña".$e->getMessage());
            }
        }

        public function cambiarDatos($id_usuario, $nombre_completo = "", $dni = "") {//Metodo para cambiar los datos de Usuario
            $campos = [];
            $valores = [];
            //Si el nombre y dni no estan vacios mete en el array de campos los datos de la consulta y sus valores en un array diferente
            if (!empty(trim($nombre_completo))) {
                $campos[] = "NOMBRE_COMPLETO = ?";
                $valores[] = trim($nombre_completo);
            }

            if (!empty(trim($dni))) {
                $campos[] = "DNI = ?";
                $valores[] = trim($dni);
            }
            //Si los dos estan vacios mostrara un mensaje indicando que no se paso ningun elemento
            if (empty($campos)) {
                return "No se proporcionaron datos para actualizar.";
            }

            $valores[] = $id_usuario;//Guardamos el id de usuario para ejecutar luego la consulta

            try {
                $this->db->beginTransaction();//Empezar transaccion
                $sql = "UPDATE usuarios SET " . implode(", ", $campos) . " WHERE ID = ?";//Usamos implode ya que une los elementos de los campos en un string separado por coma
                $stmt = $this->db->prepare($sql);
                $stmt->execute($valores);//Ejecutamos los valores del array
                $this->db->commit();
                return "Datos actualizados";//Guardar datos
            } catch (PDOException $e) {//En caso de transaccion se borran los datos que se hayan introducido
                if ($this->db->inTransaction()) {
                    $this->db->rollBack();
                }
                die("Error al cambiar los datos del usuario: " . $e->getMessage());
            }
        }


        public function mostrarUsuarios($id_admin){//Esta funcion mostramos los usuarios para eliminarlos en un form luego
            try{
                $sql="SELECT u.*
                    FROM usuarios u
                    LEFT JOIN reportes r ON u.ID = r.ID_USUARIO
                    LEFT JOIN tareas t ON u.ID = t.id_trabajador
                    LEFT JOIN fichajes f ON u.ID = f.id_trabajador
                    WHERE r.ID_USUARIO IS NULL
                    AND t.id_trabajador IS NULL
                    AND f.id_trabajador IS NULL
                    AND u.ID!=?";//Los usuarios que mostraremos, su ID no estaran en niguna otra tabla que no sea la de usuarios

                    /*$sql="Select *FROM usuarios WHERE ID !=?"; Consulta de ejemplo con todos los usuarios
                    Se usa la otra consulta para evitar fallos con las Claves foraneas*/
                $stmt=$this->db->prepare($sql);

                $stmt->execute([$id_admin]);

                return $stmt->fetchAll(PDO::FETCH_ASSOC);//Devolvemos un array de la consulta
            }catch(PDOException $e){
                die("Error al mostrar usuarios".$e->getMessage());
            }
        }
    }
?>