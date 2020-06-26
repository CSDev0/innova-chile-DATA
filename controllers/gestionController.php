<?php

ob_start();

require_once 'models/Usuario.php';
require_once 'models/Estudio.php';
require_once 'models/Log.php';
require_once 'models/Web.php';
require_once 'helpers/utils.php';

class gestionController {

    function usuarios() {
        if (utils::isAdmin()) {
            $usuario = new Usuario();
            $usuarios = $usuario->getAll();
            $log = new Log();
            $logs = $log->getAll();
            require_once("views/mensajes/mensajes-usuario.php");
            require_once('views/usuario/sidebar.php');
            require_once('views/usuario/gestion-usuarios.php');
            require_once('views/usuario/modal-agregar-usuario.php');
            require_once('views/usuario/modal-modificar-usuario.php');
            require_once('views/usuario/modal-ver-actividad.php');
            require_once("views/mensajes/modal-eliminar.php");
        } else {
            header("Location:" . base_url . 'usuario/panel');
        }
    }

    function web() {
        if (utils::isAdminOEmpleado()) {
            $web = new Web();
            require_once('views/usuario/sidebar.php');
            require_once("views/mensajes/mensajes-contenido.php");
            require_once('views/web/gestion-web.php');
            require_once('views/web/modal-agregar-pregunta.php');
            require_once('views/web/modal-modificar-pregunta.php');
            require_once("views/mensajes/modal-eliminar.php");

        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

    function estudios() {
        if (utils::isAdminOEmpleado()) {
            require_once("views/mensajes/mensajes-estudio.php");

            $estudio = new Estudio();
            $estudios = $estudio->getAll();
            $estudios2 = $estudio->getAll();

            require_once('views/usuario/sidebar.php');
            require_once('views/estudios/gestion-estudios.php');
            require_once("views/estudios/modal-agregar-estudio.php");
            require_once("views/estudios/modal-modificar-estudio.php");
            require_once("views/estudios/modal-agregar-lectura.php");
            require_once("views/estudios/modal-modificar-lectura.php");
            require_once("views/mensajes/modal-eliminar.php");
        } else {
            header("Location:" . base_url . 'web/inicio');
        }
    }

    function contenidos() {
        require_once("views/mensajes/mensajes-contenido.php");
        require_once('views/usuario/sidebar.php');
        require_once('views/contenido/gestion-contenidos.php');
        require_once('views/contenido/modal-contenidos.php');
    }

    function data() {
        require_once('views/usuario/sidebar.php');
        require_once('views/data/gestion-data.php');
        require_once('views/data/modal-buscar-data.php');
        require_once('views/data/modal-agregar-data.php');
    }

}
