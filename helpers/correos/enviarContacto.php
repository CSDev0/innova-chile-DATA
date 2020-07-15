<?php

$correo_mensaje .= "<div style=' width: fit-content; padding: 8px;  background-color: #F2F2F2; border-radius: 10px;' >";
$correo_mensaje .= "<span style='font-size: 18px; color: gray; text-align: left;'>Nombre: " . clean_string($nombre) . "</span><br>";
$correo_mensaje .= "<span style='font-size: 18px; color: gray; text-align: left;'>Apellido: " . clean_string($apellidos) . "</span><br>";
$correo_mensaje .= "<span style='font-size: 18px; color: gray; text-align: left;'>Correo: " . clean_string($correo_desde) . "</span><br>";
$correo_mensaje .= "<span style='font-size: 18px; color: gray; text-align: left;'>Telefono: " . $telefono . "</span><br>";
$correo_mensaje .= "<span style='font-size: 18px; color: gray; text-align: left;'>Comentarios: " . clean_string($comentarios) . "</span><br>";
$correo_mensaje .= "</div>";

$correo_mensaje .= "</div>";
$correo_mensaje .= "<div style=' width: 100%; padding: 8px; margin-top: 30px;  background-color: #EEEEEE; border-radius: 0px 0px 10px 10px; display: flex; justify-content: center;' >";
$correo_mensaje .= "<a href='mailto:soporte@datainnovacion.cl' style='text-align: center; float: left;  font-size: 14px;'>soporte@datainnovacion.cl</a><br>";
$correo_mensaje .= "</div>";
$correo_mensaje .= "<div style=' width: 100%; padding: 8px; margin-top: -10px;  background-color: #EEEEEE; border-radius: 0px 0px 10px 10px; display: flex; justify-content: center;' >";
$correo_mensaje .= "<img src='" . base_url . "assets/img/logos/DATAINNOVALOGO.png' style='width:220px; height: 35px; color: gray;'/><br>";
$correo_mensaje .= "</div>";
$correo_mensaje .= "</div>";
