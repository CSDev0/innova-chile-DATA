<?php
date_default_timezone_set('America/Santiago');
require_once 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->setLanguage('es');
$mail->CharSet = 'utf-8';
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = host_smtp;
$mail->Port = 587; //587 es el puerto predeterminado para seguridad TLS.
$mail->SMTPAuth = true; // Necesario autenticarse?.
$mail->Username = user_smtp; // Correo GMAIL.
$mail->Password = password_smtp; // Clave de gmail or App Specific Password.
$mail->IsHTML(true); //El contenido usa Tags HTML?