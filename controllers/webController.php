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

    function error404(){
        require_once('views/layout/error404.php');
    }
    function inicio() {
        $grafico_destacado = new Grafico_destacado();
        $graficos = $grafico_destacado->getAll();
        $graficos2 = $grafico_destacado->getAll();
        $estudio = new Estudio();
        $estudios1 = $estudio->getAllByAno();
        $estudios2 = $estudio->getAllByAno();
        $datos = utils::getDatosDestacados();
        list($dato_millones, $dato_iniciativas, $dato_beneficiados) = $datos;
        require_once('views/layout/navbar.php');
        require_once('views/layout/landing-page.php');
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

    function contacto() {
        require_once('views/layout/menubar.php');
        require_once('views/layout/contacto.php');
    }

    function contactar() {
        if (isset($_POST)) {
            $tema = $_POST['txtTema']; // required
            $nombre = $_POST['txtNombre']; // required
            $apellidos = $_POST['txtApellidos']; // required
            $correo_desde = $_POST['txtCorreo']; // required
            $telefono = $_POST['txtTelefono']; // not required
            if (strlen($telefono) > 1) {
                $telefono = clean_string($telefono);
            } else {
                $telefono = 'No registrado.';
            }
            $comentarios = $_POST['txtComentarios']; // required
            $correo_mensaje = "<div style=' width: 70%; background-color: #D1ECFF; border-radius: 5px;' >";
            $correo_mensaje .= "<div style=' width: 100%; background-color: #D1ECFF;display: flex; justify-content: end;' >";
            $correo_mensaje .= "<img src='" . base_url . "assets/img/logos/corfo_logo.png' style='width: 70px; height: 30px;'/>";
            $correo_mensaje .= "</div>";
            $correo_mensaje .= "<h2 style='font-size: 25px; color: #2680BD; text-align: center;'>Contacto desde la pagina.</h2>";
            $correo_mensaje .= "<div style=' width: 100%; background-color: #D1ECFF;display: flex; justify-content: center; border-radius: 10px;' >";

            function clean_string($string) {
                $bad = array("content-type", "bcc:", "to:", "cc:", "href");
                return str_replace($bad, "", $string);
            }

            require_once 'helpers/config_correo.php';
            require_once 'helpers/correos/enviarContacto.php';

            $mail->setFrom($correo_desde, $tema); // Set the sender of the message.
            $mail->addAddress('soporte@datainnovacion.cl', 'Contacto desde la pagina'); // Set the recipient of the message.
            $mail->Body = $correo_mensaje;
            $mail->Subject = $tema; // The subject of the message.

            if ($mail->send()) {
                $_SESSION['usu_msg'] = 'e_agregar';
            } else {
                $_SESSION['usu_msg'] = 'f_agregar';
            }
        }
        header("Location: " . base_url . 'web/contacto');
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

}

ob_end_flush();
