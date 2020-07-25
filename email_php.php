<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$cedula = $_POST["cedula"];
$mensaje = $_POST["mensaje"];

$body = "Nombre:" .$nombre . "<br>Correo: " . $correo . "<br>Cedula: 
" . $cedula . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Php_email/Exception.php';
require 'Php_email/PHPMailer.php';
require 'Php_email/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'cristobalexu234@gmail.com';                     // SMTP username
    $mail->Password   = 'cristobal9x';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('cristobalexu234@gmail.com', 'Cristobal');
    $mail->addAddress($correo, $nombre);     // Add a recipient
    

   

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Multa injusta';
    $mail->Body    = $body;
	$mail->CharSet = 'UTF-8';

    $mail->send();
    echo '<script>
	alert("El mensaje se envio correctamente");
	window.history.go(-1);
	</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}