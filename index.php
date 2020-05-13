<?php

session_start();

require_once 'autoload.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';

function mostrar_error() {
    $error = new Controllers\ErrorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_controlador = "Controllers\\".$_GET['controller'] . 'Controller';
} else {
    header("Location: ".base_url."web/inicio");
    require_once('views/layout/footer.php');
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
require_once 'views/layout/footer.php';
