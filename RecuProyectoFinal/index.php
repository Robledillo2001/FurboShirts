<?php
require_once "controlador/usuarios_controlador.php";
require_once "controlador/trabajo_controlador.php";
session_start();//Empezar Sesion
// Crear una instancia única del controlador
$usuario = new Usuarios_Controlador();
$trabajo=new Trabajo_Controlador();

$controladores = [//Cada controlador su valor es un objeto diferente que realiza una accion distinta
    "añadirUser" => $usuario,
    "verUsuarios" => $usuario,
    "opcionesUsuario"=>$usuario,
    "cambiarNombre" => $usuario,
    "cambiarContraseña" => $usuario,
    "cambiarDatos"=>$usuario,
    "login" => $usuario,
    "inicio" => $usuario,
    "eliminarUsuarios"=>$usuario,
    "logout"=>$usuario,
    "Fichar"=>$trabajo,
    "verFichajes"=>$trabajo,
    "modificarImgUsuario"=>$usuario,
    "verReportes"=>$trabajo,
    "verTareas"=>$trabajo,
    "tareasEmp"=>$trabajo,
    "añadirTareas"=>$trabajo,
    "Reportar"=>$trabajo,
    "eliminarReportes"=>$trabajo,
    "completarReportes"=>$trabajo,
    "eliminarTareas"=>$trabajo
];

$action = $_GET['action'] ?? "inicio";

if (isset($controladores[$action]) && method_exists($controladores[$action], $action)) {
    $controladores[$action]->$action(); // Llamada correcta al método
} else {
    echo "<h2>Acción no válida: $action</h2>";
}
?>