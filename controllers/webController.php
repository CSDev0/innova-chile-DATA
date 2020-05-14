<?php
ob_start();
/**
 * Description of inicioController
 *
 * @author saez_
 */
date_default_timezone_set('Etc/UTC');

class webController {

    function inicio() {
        require_once('views/layout/navbar.php');
        require_once('views/layout/landing-page.php');
    }

    function data() {
        require_once('views/layout/menubar.php');
        require_once('views/data/convocatoria-test.php');
    }

    function apptest() {
        require_once('views/layout/menubar.php');
        require_once('views/data/app.php');
    }

    function login() {
        require_once ('views/layout/menubar.php');
        require_once ('views/layout/usuario/login.php');
    }

}

ob_end_flush();