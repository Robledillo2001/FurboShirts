<?php
    function conexion(){
        // Declaramos las variables como globales para que salgan de la función
        global $dbhost, $dbname, $dbuser, $dbpasswd;

        // Corregido: Añadido el operador "" que faltaba en medio
        if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1') {
            $dbhost='localhost';
            $dbname='furboshirts';
            $dbuser='root';
            $dbpasswd='';
        } else {
            $dbhost='sql200.infinityfree.com';
            $dbname='if0_41118357_furboshirts';
            $dbuser='if0_41118357';
            $dbpasswd='PpswY01iVwhHZ';
        }
    }

    function rutasMail(){
        // Corregido: Añadido el operador "" que faltaba en medio
        if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1') {
            require_once 'PHPMailer/PHPMailer/Exception.php';
            require_once 'PHPMailer/PHPMailer/PHPMailer.php';
            require_once 'PHPMailer/PHPMailer/SMTP.php';
        } else {
            // Corregido: Corregida la "m" mayúscula de PHPMailer para el servidor Linux
            require_once __DIR__ . '/PHPMailer/PhpMailer/Exception.php';
            require_once __DIR__ . '/PHPMailer/PhpMailer/PHPMailer.php';
            require_once __DIR__ . '/PHPMailer/PhpMailer/SMTP.php';
        }
    }
?>