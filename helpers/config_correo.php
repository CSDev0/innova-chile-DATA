<?php
date_default_timezone_set('Etc/UTC');
require_once 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->setLanguage('es');
$mail->CharSet = 'utf-8';
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'mail.datainnovacion.cl';
$mail->Port = 587; //587 es el puerto predeterminado para seguridad TLS.
$mail->SMTPAuth = true; // Necesario autenticarse?.
$mail->Username = "soporte@datainnovacion.cl"; // Correo GMAIL.
$mail->Password = "datainnovacion2020@SOPORTE"; // Clave de gmail or App Specific Password.
$mail->IsHTML(true); //El contenido usa Tags HTML?