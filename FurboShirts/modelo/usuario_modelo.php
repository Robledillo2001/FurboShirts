<?php
    require_once "modelo/conexion.php";//Se requiere el archivo de conexion

    class Usuarios{//Clase de Usuarios del Modelo
        private $db;
        public function __construct(){//Contructor para conectar a la Base de Datos
            $this->db=Conexion::conexion();   
        }

        public function login($input,$contraseña){//Metodo para el login
            $sql="SELECT * FROM usuarios WHERE nombre_usuario = :input OR email = :input;";

            $stmt=$this->db->prepare($sql);

            $stmt->bindParam(":input",$input,PDO::PARAM_STR);//Parametro para coger el correo o nombre de usuario

            $stmt->execute();//Ejecutar consulta

            $usuario=$stmt->fetchAll();//Usuario con sus datos

            if($usuario){//Si existe
                $comprobar=$usuario['CONTRASEÑA'];

                if(password_verify($contraseña,$comprobar)){//Comprobara que la contraseña exista
                    return $usuario;
                }
            }
            return false;//Devolvera falso si el usuario no existe o se equivoco de contraseña
        }
    }
?>