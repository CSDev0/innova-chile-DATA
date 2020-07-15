<?php
$correo_mensaje = "<html><div style=' width: 70%; background-color: #D1ECFF; border-radius: 5px;' >";
$correo_mensaje .= "<div style=' width: 100%; background-color: #D1ECFF;display: flex; justify-content: end;' >";
$correo_mensaje .= "<img width='70' height='30' src='https://datainnovacion.cl/assets/img/logos/corfo_logo.png' style='width: 70px; height: 30px;'/>";
$correo_mensaje .= "</div>";
$correo_mensaje .= "<h2 style='font-size: 25px; color: #2680BD; text-align: center;'>Restablece tu clave.</h2>";
$correo_mensaje .= "<div style=' width: 100%; background-color: #D1ECFF;display: flex; justify-content: center; border-radius: 10px;' >";
$correo_mensaje .= "<div style=' width: fit-content; padding: 8px;  background-color: #F2F2F2; border-radius: 10px;' >";
$correo_mensaje .= "<span style='font-size: 18px; color: gray; text-align: left;'>Debes ingresar el siguiente codigo en el siguiente enlace para restablecer tu clave.</span><br>";
$correo_mensaje .= "<div style=' width: 100%;display: flex; justify-content: center; border-radius: 10px; padding: 10px;' >";
$correo_mensaje .= "<a href='".base_url."usuario/restablecerIngresarCodigo' target='_blank' style='text-align: center;  font-size: 25px; font-weight: bold;'>Ir a restablecer mi clave</a><br>";
$correo_mensaje .= "</div>";
$correo_mensaje .= "<div style=' width: 100%;display: flex; justify-content: center; border-radius: 10px; padding: 10px;' >";
$correo_mensaje .= "<span style='font-size: 25px; font-weight: bold; color: red; text-align: center; border-radius: 5px; background-color: white; padding: 8px;'>"
. "Codigo: <span style='color: #2680BD; font-weight: bold;'>" . $token_key . "</span></span><br>";
$correo_mensaje .= "</div>";
$correo_mensaje .= "<div style='justify-content: center; display: flex; margin-top: 5px;' >";
$correo_mensaje .= "<span style='font-size: 12px; color: darkred; text-align: left;'>*este codigo tiene una validez de 1 dia para ser utilizado.</span><br>";
$correo_mensaje .= "</div>";
$correo_mensaje .= "</div>";
$correo_mensaje .= "</div>";
$correo_mensaje .= "<div style=' width: 100%; padding: 8px; margin-top: 30px;  background-color: #EEEEEE; border-radius: 0px 0px 10px 10px; display: flex; justify-content: center;' >";
$correo_mensaje .= "<a href='mailto:soporte@datainnovacion.cl' style='text-align: center; float: left;  font-size: 14px;'>soporte@datainnovacion.cl</a><br>";
$correo_mensaje .= "</div>";
$correo_mensaje .= "<div style=' width: 100%; padding: 8px; margin-top: -10px;  background-color: #EEEEEE; border-radius: 0px 0px 10px 10px; display: flex; justify-content: center;' >";
$correo_mensaje .= "<img width='220' height='35' src='https://datainnovacion.cl/assets/img/logos/DATAINNOVALOGO.png' style='width:220px; height: 35px; color: gray;'/><br>";
$correo_mensaje .= "</div>";
$correo_mensaje .= "</div></html>";


