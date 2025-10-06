<?php
//Clase Conectar: Establece la conexión con la base de datos utilizando PDO.

class Conectar {
    public static function conexion() {
        try {
            // Crear la conexión PDO
            $conexion = new PDO("mysql:host=localhost;dbname=furboshirts;charset=utf8", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("Error al conectar con la base de datos: " . $e->getMessage());
        }
    }
}
?>
