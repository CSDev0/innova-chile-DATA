<?php

ob_start();

require_once 'models/Estudio.php';
require_once 'helpers/utils.php';

class estudioController {

    public function save() {
        if (utils::isAdminOEmpleado()) {

            if (isset($_POST)) {
                $id = isset($_POST['txtId']) ? $_POST['txtId'] : false;
                $nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : false;
                $descripcion = isset($_POST['txtDescripcion']) ? $_POST['txtDescripcion'] : false;
                $ano_estudio = isset($_POST['slcAno']) ? $_POST['slcAno'] : false;
                $enlace = isset($_POST['txtEnlace']) ? $_POST['txtEnlace'] : false;
                $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
                $fileArchivo = isset($_FILES['fileArchivo']) ? $_FILES['fileArchivo'] : false;
                if ($nombre && $descripcion && $ano_estudio) {
                    $estudio = new Estudio();
                    $estudio->setNombre($nombre);
                    $estudio->setDescripcion($descripcion);
                    $estudio->setAno_estudio($ano_estudio);
                    $estudio->setTipo($tipo);
                    $estudio->setUsuario_id($_SESSION['identidad']->id);

                    //Guardar el documento
                    //Preguntar si viene el parametro ID, si es asi, esto seria una modificacion del estudio.
                    if ($id != null && $id != false) {

                        $estudio->setId($id);
                        if ($fileArchivo) {
                            $archivo = $fileArchivo;
                            $nombre_archivo_raw = $archivo['name'];
                            $nombre_archivo = preg_replace('/\s+/', '', $nombre_archivo_raw);
                            $tipo_archivo = $archivo['type'];

                            if ($tipo_archivo == "application/msword" || $tipo_archivo == "application/pdf" || $tipo_archivo == "text/plain" ||
                                    $tipo_archivo == "application/vnd.ms-excel" || $tipo_archivo == "text/html" ||
                                    $tipo_archivo == "application/vnd.ms-powerpoint" ||
                                    $tipo_archivo == "application/vnd.openxmlformats-officedocument.presentationml.presentation") {
                                if (!is_dir('uploads/documentos/estudios/')) {
                                    mkdir('uploads/documentos/estudios/', 0777, true);
                                }
                                if (file_exists('uploads/documentos/estudios/' . $nombre_archivo)) {
                                    unlink('uploads/documentos/estudios/' . $nombre_archivo);
                                    move_uploaded_file($archivo['tmp_name'], 'uploads/documentos/estudios/' . $nombre_archivo);
                                    $est = new Estudio();
                                    $est->setId($id);
                                    $est1 = $est->getEstudioById();
                                    $archivo_antiguo = $est1->archivo;

                                    $estudio->setArchivo($nombre_archivo);
                                } else {
                                    move_uploaded_file($archivo['tmp_name'], 'uploads/documentos/estudios/' . $nombre_archivo);
                                    $estudio->setArchivo($nombre_archivo);
                                }
                            } else {
                                $_SESSION['estu_msg'] = "f_tipo_archivo";
                            }
                        } else {
                            $estudio->setEnlace($enlace);
                        }

                        $modify = $estudio->update();
                    } else {
                        $modify = null;
                        //Si no recibe por get, entonces es por post, entonces es para agregar un nuevo estudio.

                        if ($fileArchivo) {
                            $archivo = $_FILES['fileArchivo'];
                            $tipo_archivo = $archivo['type'];
                            $nombre_archivo_raw = $archivo['name'];
                            $nombre_archivo = preg_replace('/\s+/', '', $nombre_archivo_raw);

                            if ($tipo_archivo == "application/msword" || $tipo_archivo == "application/pdf" || $tipo_archivo == "text/plain" ||
                                    $tipo_archivo == "application/vnd.ms-excel" || $tipo_archivo == "text/html" ||
                                    $tipo_archivo == "application/vnd.ms-powerpoint" ||
                                    $tipo_archivo == "application/vnd.openxmlformats-officedocument.presentationml.presentation") {
                                if (!file_exists('uploads/documentos/estudios')) {
                                    mkdir('uploads/documentos/estudios', 0777, true);
                                }
                                if (file_exists('uploads/documentos/estudios/' . $nombre_archivo)) {
                                    unlink('uploads/documentos/estudios/' . $nombre_archivo);
                                    move_uploaded_file($archivo['tmp_name'], 'uploads/documentos/estudios/' . $nombre_archivo);
                                    $estudio->setArchivo($nombre_archivo);
                                } else {
                                    move_uploaded_file($archivo['tmp_name'], 'uploads/documentos/estudios/' . $nombre_archivo);
                                    $estudio->setArchivo($nombre_archivo);
                                }
                            } else {
                                $_SESSION['estu_msg'] = "f_tipo_archivo";
                                header("Location:" . base_url . 'gestion/estudios');
                            }
                        } else {
                            $estudio->setEnlace($enlace);
                        }
                        $save = $estudio->save();
                    }

                    if (isset($save) && $save == true) {
                        $_SESSION['estu_msg'] = 'e_agregar';
                    } elseif ($save == false & $save != null) {
                        $_SESSION['estu_msg'] = 'f_agregar';
                    }

                    if (isset($modify) && $modify == true) {
                        $_SESSION['estu_msg'] = 'e_modificar';
                    } elseif ($modify == false & $modify != null) {
                        $_SESSION['estu_msg'] = 'f_modificar';
                    }
                } else {
                    $_SESSION['estu_msg'] = 'f_datos';
                    header("Location:" . base_url . home);
                }
                header("Location:" . base_url . 'gestion/estudios');
            } else {
                header("Location:" . base_url . home);
            }
        }
    }

    public function delete() {
        if (utils::isAdminOEmpleado()) {
            if (isset($_GET['id'])) {
                $estudio = new Estudio();
                $id = $_GET['id'];
                $estudio->setId($id);
                $est = $estudio->getEstudioById();
                $resultado = $estudio->delete();
                if ($resultado) {
                    $_SESSION['estu_msg'] = "e_eliminar";
                    if ($est->tipo == "estudio") {
                        if (file_exists('uploads/documentos/estudios/' . $est->archivo)) {
                            unlink('uploads/documentos/estudios/' . $est->archivo);
                        }
                    }
                } else {
                    $_SESSION['estu_msg'] = "f_eliminar";
                }
                header("Location:" . base_url . 'gestion/estudios');
            } else {
                header("Location:" . base_url . home);
            }
        } else {
            header("Location:" . base_url . home);
        }
    }

    public function view() {
        if (utils::isAdminOEmpleado()) {
            if (isset($_GET['id'])) {
                $estudio = new Estudio();
                $id = $_GET['id'];
                $estudio->setId($id);
                $est = $estudio->getEstudioById();
                require_once ('views/estudios/modal-ver-estudio.php');
            } else {
                
            }
        } else {
            header("Location:" . base_url . home);
        }
    }

    function modificarLectura() {
        if (utils::isAdminOEmpleado()) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                header("Location:" . base_url . 'gestion/estudios&id=' . $id);
            }
        } else {
            header("Location:" . base_url . home);
        }
    }

}

ob_end_flush();
