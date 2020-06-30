<?php

ob_start();

session_start();
require_once 'autoload.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';

require_once 'config/db.php';
require_once 'views/layout/header.php';
require_once 'views/mensajes/mensajes-usuario.php';
require_once 'views/mensajes/mensajes-autenticacion.php';

function mostrar_error() {
    $error = new errorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
} else {
    header("Location: " . base_url . "web/inicio");
    require_once('views/layout/footer-sticky.php');
    exit();
}
if (class_exists($nombre_controlador)) {

    $controlador = new $nombre_controlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } else {
        mostrar_error();
    }
} else {
    mostrar_error();
}
require_once 'views/layout/footer-sticky.php';

ob_end_flush();
