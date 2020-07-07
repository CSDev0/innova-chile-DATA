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
require_once 'models/Web.php';

class webController {

    function inicio() {
        $grafico_destacado = new Grafico_destacado();
        $graficos = $grafico_destacado->getAll();
        $estudio = new Estudio();
        $estudios1 = $estudio->getAllByAno();
        $estudios2 = $estudio->getAllByAno();
        $datos = utils::getDatosDestacados();
        list($dato_millones, $dato_iniciativas, $dato_beneficiados) = $datos;
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

    function faq() {
        require_once 'models/Contenido.php';
        $preguntas = new Contenido();
        $preguntas = $preguntas->searchPregunta('all');
        require_once('views/layout/menubar.php');
        require_once('views/preguntas/preguntas-frecuentes.php');
    }

    public function update() {
        if (utils::isAdminOEmpleado()) {
            if (isset($_POST)) {
                $web = new Web();
                $web->setId(1);
                $web->setNombreWeb($_POST['txtNombre']);
                $web->setIgLink($_POST['txtIgLink']);
                $web->setFbLink($_POST['txtFbLink']);
                $web->setTwtLink($_POST['txtTwtLink']);
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

}

ob_end_flush();
