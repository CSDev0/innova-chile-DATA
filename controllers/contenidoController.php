<?php

ob_start();

require_once 'models/Contenido.php';
require_once 'models/Usuario.php';
require_once 'models/Archivo.php';
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
                    } else {
                        if (isset($save) && $save == true) {
                            $_SESSION['cont_msg'] = 'e_agregar';
                        } elseif ($save == false & $save != null) {
                            $_SESSION['cont_msg'] = 'f_agregar';
                        }
                    }
                    if (isset($update) && $update == true && $txtTipo == 'pregunta') {
                        $_SESSION['preg_msg'] = 'e_modificar';
                    } elseif ($update == false & $update != null && $txtTipo == 'pregunta') {
                        $_SESSION['preg_msg'] = 'f_modificar';
                    } else {
                        if (isset($update) && $update == true) {
                            $_SESSION['cont_msg'] = 'e_modificar';
                        } elseif ($update == false & $update != null) {
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

    public function saveArchivo() {
        if (utils::isAdminOEmpleado()) {
            if (isset($_POST)) {
                $archivo_model = new Archivo();
                $fileArchivo = isset($_FILES['fileArchivo']) ? $_FILES['fileArchivo'] : false;
                if ($fileArchivo) {
                    $archivo = $_FILES['fileArchivo'];
                    $tipo_archivo = $archivo['type'];
                    $nombre_archivo_raw = $archivo['name'];
                    $nombre_archivo = preg_replace('/\s+/', '', $nombre_archivo_raw);

                    if ($tipo_archivo == "application/msword" || $tipo_archivo == "application/pdf" || $tipo_archivo == "text/plain" ||
                            $tipo_archivo == "application/vnd.ms-excel" || $tipo_archivo == "text/html" ||
                            $tipo_archivo == "application/vnd.ms-powerpoint" ||
                            $tipo_archivo == "application/vnd.openxmlformats-officedocument.presentationml.presentation" ||
                            $tipo_archivo == "image/gif" || $tipo_archivo == "image/png" || $tipo_archivo == "image/jpg" || $tipo_archivo == "image/jpeg") {
                        if (!file_exists('uploads/archivos/')) {
                            mkdir('uploads/archivos/', 0777, true);
                        }
                        if (file_exists('uploads/archivos/' . $nombre_archivo)) {
                            unlink('uploads/archivos/' . $nombre_archivo);
                            move_uploaded_file($archivo['tmp_name'], 'uploads/archivos/' . $nombre_archivo);
                            $archivo_model->setArchivo($nombre_archivo);
                        } else {
                            move_uploaded_file($archivo['tmp_name'], 'uploads/archivos/' . $nombre_archivo);
                            $archivo_model->setArchivo($nombre_archivo);
                        }
                    } else {
                        $_SESSION['cont_msg'] = "f_extension";
                        header("Location:" . base_url . 'gestion/contenidos');
                    }
                    $resultado = $archivo_model->save();
                    if ($resultado) {
                        $_SESSION['cont_msg'] = "e_archivo_agregar";
                    } else {
                        $_SESSION['cont_msg'] = "f_archivo_agregar";
                    }
                    header("Location:" . base_url . 'gestion/contenidos');
                }
                header("Location:" . base_url . 'gestion/contenidos');
            }
        }
    }

    public function deleteArchivo() {
        if (utils::isAdminOEmpleado()) {
            if (isset($_GET['id'])) {
                $archivo = new Archivo();
                $id = $_GET['id'];
                $archivo->setId($id);
                $arc = $archivo->getArchivoById();
                $resultado = $archivo->delete();
                if ($resultado) {
                    $_SESSION['cont_msg'] = "e_archivo_eliminar";
                    if (file_exists('uploads/archivos/' . $arc->archivo)) {
                        unlink('uploads/archivos/' . $arc->archivo);
                    }
                } else {
                    $_SESSION['cont_msg'] = "f_archivo_eliminar";
                }
                header("Location:" . base_url . 'gestion/contenidos');
            } else {
                header("Location:" . base_url . home);
            }
        } else {
            header("Location:" . base_url . home);
        }
    }

    public function updateDatos() {
        if (utils::isAdminOEmpleado()) {
            if (isset($_POST)) {
                $txtBeneficiados = isset($_POST['txtDatoBeneficiados']) ? $_POST['txtDatoBeneficiados'] : false;
                $txtMillones = isset($_POST['txtDatoMillones']) ? $_POST['txtDatoMillones'] : false;
                $txtIniciativas = isset($_POST['txtDatoIniciativas']) ? $_POST['txtDatoIniciativas'] : false;

                if ($txtBeneficiados || $txtMillones || $txtIniciativas) {
                    $now = new DateTime();
                    $date = $now->format("Y-m-d H:i:s");

                    if ($txtMillones) {
                        $contenido = new Contenido();
                        $contenido->setTipo('dato_millones');
                        $contenido->setTexto($txtMillones);
                        $contenido->setUltima_modificacion($date);
                        $contenido->setUsuario_id($_SESSION['identidad']->id);
                        $contenido->setNombre('Dato destacado - Millones');
                        $cont_encontrado = $contenido->getContenidoByTipo();
                        if ($cont_encontrado) {
                            $resultado = $contenido->update();
                        } else {
                            $resultado = $contenido->save();
                        }
                    }
                    if ($txtBeneficiados) {
                        $contenido = new Contenido();
                        $contenido->setTipo('dato_beneficiados');
                        $contenido->setTexto($txtBeneficiados);
                        $contenido->setUltima_modificacion($date);
                        $contenido->setUsuario_id($_SESSION['identidad']->id);
                        $contenido->setNombre('Dato destacado - Beneficiados');
                        $cont_encontrado = $contenido->getContenidoByTipo();
                        if ($cont_encontrado) {
                            $resultado = $contenido->update();
                        } else {
                            $resultado = $contenido->save();
                        }
                    }
                    if ($txtIniciativas) {
                        $contenido = new Contenido();
                        $contenido->setTipo('dato_iniciativas');
                        $contenido->setTexto($txtIniciativas);
                        $contenido->setUltima_modificacion($date);
                        $contenido->setUsuario_id($_SESSION['identidad']->id);
                        $contenido->setNombre('Dato destacado - Iniciativas apoyadas');
                        $cont_encontrado = $contenido->getContenidoByTipo();
                        if ($cont_encontrado) {
                            $resultado = $contenido->update();
                        } else {
                            $resultado = $contenido->save();
                        }
                    }
                    if (isset($resultado) && $resultado == true) {
                        $_SESSION['cont_msg'] = 'e_modificar';
                    } elseif ($resultado == false & $resultado != null) {
                        $_SESSION['cont_msg'] = 'f_modificar';
                    }
                    header("Location:" . base_url . 'gestion/data');
                } else {
                    $_SESSION['cont_msg'] = 'f_datos';
                    header("Location:" . base_url . 'gestion/data');
                }
            } else {
                header("Location:" . base_url . 'usuario/panel');
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

}
