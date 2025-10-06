<?php
    session_start();
    setcookie($_SESSION['rol'], "", time() - 3600, "/");
    session_unset();
    session_destroy();

    if(isset($_COOKIE['recordar_user'])){
        setcookie('recordar_user','',time()-3600,"/");
    }

    header("Location: index.php?action=inicio");
    exit;
?>