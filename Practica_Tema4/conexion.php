<?php
    try{
        $conexion=new PDO("mysql:host=localhost;dbname=academia","root","");//Se inicia la conexion con el tipo de bsd el host y nombre de la bsd, el usuario y contraseña
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//Se pone un atributo para el manejo de errores
        $conexion->exec("SET CHARACTER SET utf8");
    }catch(PDOException $e){
        die("Error de conexion: ".$e->getMessage());
    }
?>