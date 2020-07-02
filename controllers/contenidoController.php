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

                    if (isset($save) && $save == true && $txtTipo == 'pregunta') {
                        $_SESSION['preg_msg'] = 'e_agregar';
                    } elseif ($save == false & $save != null && $txtTipo == 'pregunta') {
                        $_SESSION['preg_msg'] = 'f_agregar';
                    }else{
                        if (isset($save) && $save == true){
                            $_SESSION['cont_msg'] = 'e_agregar';
                        }elseif ($save == false & $save != null) {
                            $_SESSION['cont_msg'] = 'f_agregar';
                        }
                    }
                    if (isset($update) && $update == true && $txtTipo == 'pregunta') {
                        $_SESSION['preg_msg'] = 'e_modificar';
                    } elseif ($update == false & $update != null && $txtTipo == 'pregunta') {
                        $_SESSION['preg_msg'] = 'f_modificar';
                    }else{
                        if (isset($update) && $update == true){
                            $_SESSION['cont_msg'] = 'e_modificar';
                        }elseif ($update == false & $update != null) {
                            $_SESSION['cont_msg'] = 'f_modificar';
                        }
                    }
                    if ($txtTipo == "pregunta") {
                        header("Location:" . base_url . 'gestion/web');
                    } else {
                        header("Location:" . base_url . 'gestion/contenidos');
                    }
                } else {
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
                    $contenido->setUltima_modificacion($date);
                    $contenido->setUsuario_id($_SESSION['identidad']->id);
                    $update = $contenido->updateById();

                    if (isset($update) && $update == true) {
                        $_SESSION['preg_msg'] = 'e_modificar';
                    } elseif ($update == false & $update != null) {
                        $_SESSION['preg_msg'] = 'f_modificar';
                    }
                    header("Location:" . base_url . 'gestion/web');
                } else {
                    $_SESSION['preg_msg'] = 'f_datos';
                        header("Location:" . base_url . 'gestion/web');
                    }
            } else {
                header("Location:" . base_url . 'usuario/panel');
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }
    public function deletePregunta() {
        if (utils::isAdminOEmpleado()) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $contenido = new Contenido();
                $contenido->setId($id);
                $resultado = $contenido->delete();
                if ($resultado) {
                    $_SESSION['preg_msg'] = 'e_eliminar';
                    header("Location:" . base_url . 'gestion/web');
                }
            } else {
                $_SESSION['preg_msg'] = 'f_eliminar';
                header("Location:" . base_url . 'gestion/web');
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

}
