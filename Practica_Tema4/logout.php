<?php
    session_start();
    session_destroy(); // Cerrar la sesión del usuario
    header("Location: login.php");
exit();
?>
