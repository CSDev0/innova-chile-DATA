<?php

ob_start();
/**
 * Description of inicioController
 *
 * @author saez_
 */
date_default_timezone_set('Etc/UTC');
require_once ('models/Estudio.php');
require_once 'models/Grafico_destacado.php';
require_once 'models/Convocatoria.php';
require_once 'models/Web.php';
require_once 'PHPMailer/PHPMailerAutoload.php';

class webController {

    function error404() {
        require_once('views/layout/error404.php');
    }
    
    function inicio() {
        $grafico_destacado = new Grafico_destacado();
        $graficos = $grafico_destacado->getAll();
        $graficos2 = $grafico_destacado->getAll();
        $datos = utils::getDatosDestacados();
        list($dato_millones, $dato_iniciativas, $dato_beneficiados) = $datos;
        require_once('views/layout/navbar.php');
        require_once('views/layout/landing-page.php');
    }

    function test() {
        require_once('views/layout/menubar.php');
        require_once('views/development/test.php');
    }

    function login() {
        require_once('views/usuario/modal-restablecer.php');
        require_once('views/layout/menubar.php');
        require_once('views/usuario/login.php');
    }

    function data() {
        require_once('views/layout/menubar.php');
        require_once('views/data/convocatoria-test.php');
    }

    function convocatorias() {
        $convocatoria = new Convocatoria();
        $convocatorias = $convocatoria->getAll();
        $convocatorias2 = $convocatoria->getAll();
        $anosConv = $convocatoria->getAnos();
        $anosConv2 = $convocatoria->getAnos();
        require_once('views/layout/menubar.php');
        require_once('views/convocatorias/menubar-convocatorias.php');
        require_once('views/convocatorias/convocatorias.php');
    }

    function politicas_publicas() {
        $estudio = new Estudio();
        $estudios1 = $estudio->getAllByAno();
        $estudios2 = $estudio->getAllByAno();
        $estudios3 = $estudio->getAllByAno();
        require_once('views/layout/menubar.php');
        require_once('views/layout/landing-page/d-estudios.php');
    }

    function chile_en_el_mundo() {
        require_once('views/layout/menubar.php');
        require_once('views/layout/landing-page/e-chile-en-el-mundo.php');
    }

    function portafolio() {
        require_once('views/layout/menubar.php');
        require_once('views/data/portafolio.php');
    }

    function leyid() {
        require_once('views/layout/menubar.php');
        require_once('views/data/leyid.php');
    }

    function historico() {
        require_once('views/layout/menubar.php');
        require_once('views/convocatorias/historico.php');
    }

    function faq() {
        require_once 'models/Contenido.php';
        $preguntas = new Contenido();
        $preguntas = $preguntas->searchPregunta('all');
        require_once('views/layout/menubar.php');
        require_once('views/preguntas/preguntas-frecuentes.php');
    }

    function update() {
        if (utils::isAdminOEmpleado()) {
            if (isset($_POST)) {
                $web = new Web();
                $web->setId(1);
                $web->setNombreWeb($_POST['txtNombre']);
                $web->setIgLink($_POST['txtIgLink']);
                $web->setFbLink($_POST['txtFbLink']);
                $web->setTwtLink($_POST['txtTwtLink']);
                $web->setPortafolio_link($_POST['txtPortafolio']);
                $web->setLeyid_link($_POST['txtLeyId']);
                $web->setHistorico_link($_POST['txtHistorico']);
                $pie_pag = $_POST['txtPiePag'];
                $web->setPiePagina(json_decode($pie_pag, true));
                $resultado = $web->update();
                if ($resultado) {
                    $_SESSION['web_msg'] = "e_modificar";
                } else {
                    $_SESSION['web_msg'] = "f_modificar";
                }
            }
            header("Location:" . base_url . 'gestion/web');
        } else {
            header('Location:' . base_url . 'web/inicio');
        }
    }

    function develop() {
        if (utils::isAdminOEmpleado()) {
            require_once 'views/layout/sidebar.php';
            require_once 'views/development/menu.php';
        }
    }

}

ob_end_flush();
