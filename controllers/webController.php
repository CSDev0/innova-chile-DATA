<?php

ob_start();
/**
 * Description of inicioController
 *
 * @author saez_
 */
date_default_timezone_set('Etc/UTC');
require_once ('models/Estudio.php');

class webController {

    function inicio() {
        $estudio = new Estudio();
        $estudios1 = $estudio->getAllByAno();
        $estudios2 = $estudio->getAllByAno();

        require_once('views/layout/navbar.php');
        require_once('views/layout/landing-page.php');
    }

    function login() {
        require_once('views/layout/menubar.php');
        require_once('views/usuario/login.php');
    }

    function data() {
        require_once('views/layout/menubar.php');
        require_once('views/data/convocatoria-test.php');
    }

    function convocatorias() {
        require_once('views/layout/menubar.php');
        require_once('views/convocatorias/menubar-convocatorias.php');
        require_once('views/convocatorias/convocatorias.php');
    }

    function apptest() {
        require_once('views/layout/menubar.php');
        require_once('views/data/app.php');
    }
    function faq(){
        require_once 'models/Contenido.php';
        $preguntas = new Contenido();
        $preguntas = $preguntas->searchPregunta('all');
        require_once('views/layout/menubar.php');
        require_once('views/preguntas/preguntas-frecuentes.php');
    }

}

ob_end_flush();
