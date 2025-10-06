<?php
    require_once "controlador/alquiler_controlador.php";
    $controlador=new AlquilerControlador();

    $action=$_GET['action']??"inicio";

    if(method_exists($controlador,$action)){
        $controlador->$action();//Si el controlador encuentra el metodo del action lo ejecutara y se mostrara en el index
    }else{
        echo "<h2>SALIDA NO VALIDA</h2>";
    }
?>