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
        require_once('views/layout/menubar.php');
        require_once('views/layout/usuario/login.php');
    }
    function admin()
    {
        require_once('views/layout/usuario/admin/adminArea.php');
    }
    function cuentas()
    {
      require_once('views/layout/usuario/admin/cuentas.php');
      require_once("views/layout/usuario/admin/edit-modal.php");
      require_once("views/layout/usuario/admin/delete-modal.php");
      require_once("views/layout/usuario/admin/add-modal.php");
    }
    function contenido()
    {
      require_once('views/layout/usuario/contenido.php');
    }
    function archivos()
    {
      require_once('views/layout/usuario/archivos.php');
      require_once("views/layout/usuario/addAr-modal.php");
      require_once("views/layout/usuario/deleteAr-modal.php");
    }
    function sectionA()
    {
      require_once('views/layout/usuario/secciones/quines-somos.php');
    }
    function sectionB()
    {
      require_once('views/layout/usuario/secciones/graficos-destacados.php');
    }
    function sectionC()
    {
      require_once('views/layout/usuario/secciones/data.php');
    }
    function sectionD()
    {
      require_once('views/layout/usuario/secciones/estudios.php');
    }
    function sectionE()
    {
      require_once('views/layout/usuario/secciones/chile-en-el-mundo.php');
    }
    function usuario()
    {
      require_once('views/layout/usuario/normal/userArea.php');
    }

}

ob_end_flush();
