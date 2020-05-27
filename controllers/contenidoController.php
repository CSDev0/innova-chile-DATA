<?php

ob_start();

require_once 'models/Contenido.php';
require_once 'models/Usuario.php';
require_once 'helpers/utils.php';

class contenidoController {

    function save() {
        if (utils::isAdminOEmpleado()) {
            if (isset($_POST)) {
                $txtTipo = isset($_POST['txtTipo']) ? $_POST['txtTipo'] : false;
                $txtTexto = isset($_POST['txtTexto']) ? $_POST['txtTexto'] : false;
                
                if ($txtTipo && $txtTexto) {
                    $now = new DateTime();
                    $date = $now->format("Y-m-d H:i:s");
                    
                    $contenido = new Contenido();

                    $contenido->setTipo($txtTipo);
                    $contenido->setTexto($txtTexto);
                    $contenido->setFecha_modificacion($date);
                    $contenido->setUsuario_id($_SESSION['identidad']->id);

                    $cont = $contenido->getContenidoByTipo();
                    
                    if ($cont != null) {
                        $update = $contenido->update();
                    } else {
                        $save = $contenido->save();
                    }

                    if (isset($save) && $save == true) {
                        $_SESSION['contenido_mensaje'] = 'exito';
                    } elseif ($save == false & $save != null) {
                        $_SESSION['contenido_mensaje'] = 'fallo';
                    }
                    
                    if (isset($update) && $update == true) {
                        $_SESSION['contenido_mensaje'] = 'exito';
                    } elseif ($update == false & $update != null) {
                        $_SESSION['contenido_mensaje'] = 'fallo';
                    }
                    
                    header("Location:" . base_url . 'gestion/contenidos');
                } else {
                    $_SESSION['contenido_mensaje'] = 'fallo_datos';
                    header("Location:" . base_url . 'gestion/contenidos');
                }
            } else {
                header("Location:" . base_url . 'gestion/contenidos');
            }
        } else {
            header("Location:" . base_url . 'web/inicio');
        }
    }

}
