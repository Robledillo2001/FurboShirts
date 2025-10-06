<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir las clases de PHPMailer
require 'PHPMailer/PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer/PHPMailer.php';
require 'PHPMailer/PHPMailer/SMTP.php';

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Habilitar depuración para ver mensajes detallados
    $mail->SMTPDebug = 2; // Cambia a 0 para producción
    $mail->Debugoutput = 'html';

    // Configuración del servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'lopezreinarobledilloruben@gmail.com';          // Tu correo de Gmail
    $mail->Password = 'yaxm pdrr hbbr tonk';   // Contraseña de aplicación de Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Cifrado STARTTLS
    $mail->Port = 587;

    // Configurar el remitente y destinatarios
    $mail->setFrom('lopezreinarobledilloruben@gmail.com', 'Tu Nombre');         // Remitente
    $mail->addAddress('rl4845011@gmail.com', 'Destinatario'); // Destinatario principal
    $mail->addCC('lopezreinarobledilloruben@gmail.com');                    // Copia (opcional)
    $mail->addBCC('rl4845011@gmail.com');                  // Copia oculta (opcional)

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Asunto del correo';
    $mail->Body    = '<h1>Hola, este es un correo de prueba</h1><p>Enviado usando PHPMailer y SMTP de Gmail.</p>';
    $mail->AltBody = 'Hola, este es un correo de prueba enviado usando PHPMailer y SMTP de Gmail.';

    // Enviar el correo
    //$mail->send();
    echo 'El correo ha sido enviado exitosamente.';
} catch (Exception $e) {
    echo "El correo no pudo ser enviado. Error: {$mail->ErrorInfo}";
}
?>
