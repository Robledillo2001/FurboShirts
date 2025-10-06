<?php
    session_start();
    unset($_SESSION['prestamos']);
    session_unset();
    session_destroy();
    header("Location: index.php");
    echo "Se reinicio el servidor";
    exit;
?>