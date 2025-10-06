<?php
require_once "conexion.php";

class Login {
    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();
    }

    public function comprobarLogin($usuario, $contraseña) {//Metodo para el logueo del usuario
        session_start();
        $roles=[//roles segun el usuario que se haya logueado
            'admin'=>'administradores',
            'usuario'=>"usuarios"
        ];
        foreach($roles as $rol=>$tabla){//recorremos los roles 
            $sql = "SELECT * FROM $tabla WHERE NOMBRE = :nombre";//Y se hace la consulta segun el rol del usuario que se encuentre en una de las dos tablas
            try {
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":nombre", $usuario, PDO::PARAM_STR);
                $stmt->execute();
        
                if ($stmt->rowCount() > 0) {//Si encuentra filas
                    $fila = $stmt->fetch(PDO::FETCH_ASSOC);//Se convierte en un array los datos
                    $hash=$fila['CONTRASEÑA'];
                    if (password_verify($contraseña,$hash)) {//Si se verifica que la contraseña en la BSD y la que pasamos en la funcion son iguales
                        $_SESSION['rol']=$rol;//Se pondra una sesion segun el rol donde haya encontrado al usuario
                        return $fila;//Devuelve los datos del array
                    }
                }
        
            } catch (PDOException $e) {
                error_log("Error en comprobarLogin: " . $e->getMessage());
                return null;
            }
        }
        return null;
    }

    public function cambiarContraseña($id, $contraseña_vieja, $contraseña_nueva, $rol) {
        // Selección de tabla según el rol
        $tabla = ($rol === "admin") ? 'administradores' : 'usuarios';
    
        try {
            // Consulta para obtener la contraseña actual del usuario
            $sql = "SELECT CONTRASEÑA FROM $tabla WHERE ID = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
    
            // Verificar si el usuario existe
            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                $contraseña_tabla = $resultado['CONTRASEÑA'];
    
                // Verificar si la contraseña actual coincide
                if (password_verify($contraseña_vieja, $contraseña_tabla)) {
                    // Hash de la nueva contraseña
                    $contraseña_nueva_hash = password_hash($contraseña_nueva, PASSWORD_DEFAULT);
    
                    // Iniciar transacción
                    $this->db->beginTransaction();
    
                    // Actualizar la contraseña en la base de datos
                    $sql = "UPDATE $tabla SET CONTRASEÑA = :contrasena WHERE ID = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(":contrasena", $contraseña_nueva_hash, PDO::PARAM_STR);
                    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                    $stmt->execute();
    
                    // Confirmar la transacción
                    $this->db->commit();
                    return "Contraseña cambiada exitosamente.";
                } else {
                    return "La contraseña actual es incorrecta.";
                }
            } else {
                return "Usuario no encontrado.";
            }
        } catch (PDOException $e) {
            // Revertir la transacción en caso de error
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
            return "Error al cambiar la contraseña: " . $e->getMessage();
        }
    }

    public function eliminarUsuarios($nombre,$tipo){
        try{
            $tabla=($tipo==="admin")?'administradores' : 'usuarios';//Si se selecciona un rol en el formulario se insertara en una tabla u otra
            $this->db->beginTransaction();//Inicia transaccion
            $sql="DELETE from $tabla WHERE NOMBRE=?";//Borrar por el nombre
            $stmt=$this->db->prepare($sql);

            $stmt->execute([$nombre]);
            $this->db->commit();//Los datos se guardan permanentemente
        }catch(PDOException $e){
            if($this->db->inTransaction()){//Si hay una transaccion
                $this->db->rollBack();//Se deshacen los cambios
                die("Error al eliminar usuario: ").$e->getMessage();
            }
        }
    }

    public function agregarUsuarios($nombre, $contraseña, $correo, $tipo) {//Funcion donde el admin puede añadir usuarios
        try {
            $this->db->beginTransaction();
            $hash = password_hash($contraseña, PASSWORD_DEFAULT); // Hasheamos la contraseña
    
            $tabla = ($tipo === "admin") ? 'administradores' : 'usuarios'; // Selección de tabla
    
            // Consulta SQL correcta para admin y usuario
            $sql = ($tipo === "admin") 
                ? "INSERT INTO $tabla (NOMBRE, CONTRASEÑA) VALUES (?, ?)"
                : "INSERT INTO $tabla (NOMBRE, CONTRASEÑA, correo_electronico) VALUES (?, ?, ?)";
    
            $stmt = $this->db->prepare($sql);
    
            // Parámetros correctos
            $parametros = ($tipo === "admin") ? [$nombre, $hash] : [$nombre, $hash, $correo];
    
            $stmt->execute($parametros);
            $this->db->commit();
        } catch (PDOException $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
            die("Error al Añadir usuario: " . $e->getMessage());
        }
    }

    public function registrarUsuario($nombre,$contraseña,$email){//Funcion solo para registrar usuarios antes de loguearse
        try{
            $this->db->beginTransaction();
            $sql="INSERT INTO usuarios(NOMBRE,CONTRASEÑA,CORREO_ELECTRONICO)VALUES(?,?,?)";
            $stmt=$this->db->prepare($sql);

            $stmt->execute([$nombre,$contraseña,$email]);

            $this->db->commit();
        }catch(PDOException $e){
            if($this->db->inTransaction()){
                $this->db->rollBack();
            }
            die("Error en el registro de usuario: ".$e->getMessage());
        }
    }

    function cambiarNombre($id,$nombre,$rol){
        // Selección de tabla según el rol
        $tabla = ($rol === "admin") ? 'administradores' : 'usuarios';
        try{
            $this->db->beginTransaction();

            $sql="UPDATE $tabla SET NOMBRE=:nombre WHERE ID=:id";
            $stmt=$this->db->prepare($sql);

            $stmt->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $stmt->bindParam(":id",$id,PDO::PARAM_INT);

            $stmt->execute();
            $this->db->commit();//Guardar los datos de la transaccion
            return"Cambio de nombre exitoso";
        }catch(PDOException $e){
            if($this->db->inTransaction()){
                $this->db->rollBack();
            }
            die("Fallo al cambiar de nombre".$e->getMessage());
        }
    }

    public function agregarCookies($accion,$usuario){//Metodo para añadir cookies al loguearnos 
        setcookie($accion,$usuario,time()+3600,"/");
    }
}
?>
