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
                $txtNombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : false;
                $txtTexto = isset($_POST['txtTexto']) ? $_POST['txtTexto'] : false;

                if ($txtTipo && $txtTexto) {
                    $now = new DateTime();
                    $date = $now->format("Y-m-d H:i:s");

                    $contenido = new Contenido();

                    $contenido->setTipo($txtTipo);
                    $contenido->setNombre($txtNombre);
                    $contenido->setTexto($txtTexto);
                    $contenido->setUltima_modificacion($date);
                    $contenido->setUsuario_id($_SESSION['identidad']->id);

                    if ($txtTipo != "pregunta") {
                        $cont = $contenido->getContenidoByTipo();

                        if ($cont != null) {
                            $update = $contenido->update();
                        } else {
                            $save = $contenido->save();
                        }
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
                    if ($txtTipo == "pregunta") {
                        header("Location:" . base_url . 'gestion/web');
                    } else {
                        header("Location:" . base_url . 'gestion/contenidos');
                    }
                } else {
                    $_SESSION['contenido_mensaje'] = 'fallo_datos';
                    if ($txtTipo == "pregunta") {
                        header("Location:" . base_url . 'gestion/web');
                    } else {
                        header("Location:" . base_url . 'gestion/contenidos');
                    }
                }
            } else {
                header("Location:" . base_url . 'usuario/panel');
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

    public function updatePregunta() {
        if (utils::isAdminOEmpleado()) {
            if (isset($_POST)) {
                $txtId = isset($_POST['txtId']) ? $_POST['txtId'] : false;
                $txtTipo = isset($_POST['txtTipo']) ? $_POST['txtTipo'] : false;
                $txtNombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : false;
                $txtTexto = isset($_POST['txtTexto']) ? $_POST['txtTexto'] : false;

                if ($txtTipo && $txtTexto && $txtId && $txtTipo) {
                    $now = new DateTime();
                    $date = $now->format("Y-m-d H:i:s");

                    $contenido = new Contenido();
                    $contenido->setId($txtId);
                    $contenido->setTipo($txtTipo);
                    $contenido->setNombre($txtNombre);
                    $contenido->setTexto($txtTexto);
                    $contenido->setFecha_modificacion($date);
                    $contenido->setUsuario_id($_SESSION['identidad']->id);
                    $update = $contenido->updateById();

                    if (isset($update) && $update == true) {
                        $_SESSION['contenido_mensaje'] = 'exito';
                    } elseif ($update == false & $update != null) {
                        $_SESSION['contenido_mensaje'] = 'fallo';
                    }
                    header("Location:" . base_url . 'gestion/web');
                } else {
                    $_SESSION['contenido_mensaje'] = 'fallo_datos';
                        header("Location:" . base_url . 'gestion/web');
                    }
            } else {
                header("Location:" . base_url . 'usuario/panel');
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

}
