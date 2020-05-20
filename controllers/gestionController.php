<?php

ob_start();

require_once 'models/Usuario.php';
require_once 'models/Estudio.php';
require_once 'helpers/utils.php';

class gestionController {

    function usuarios() {
        
    }

    function estudios() {
        if (utils::isAdminOEmpleado()) {
            require_once("views/mensajes/mensajes-estudio.php");
            
            $estudio = new Estudio();
            $estudios = $estudio->getAll();
            $estudios2 = $estudio->getAll();
            
            require_once ('views/usuario/sidebar.php');
            require_once('views/estudios/gestion-estudios.php');
            require_once("views/estudios/modal-agregar-estudio.php");
            require_once("views/estudios/modal-agregar-lectura.php");
            require_once("views/mensajes/modal-eliminar.php");
        }else{
            header("Location:" . base_url . 'web/inicio');
        }
    }

}