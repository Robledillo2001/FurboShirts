<?php
    session_start();

    unset($_SESSION['nombre']);//Borrar el nombre de usuario 
    //unset($_SESSION['Gestor']);
    //session_destroy();
    header('Location: login.php');//Redirigir al login
    exit;
?>