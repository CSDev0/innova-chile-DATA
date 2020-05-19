<?php
ob_start();

require_once 'models/Estudio.php';
require_once 'helpers/utils.php';

class estudioController {

    public function save() {
        if (utils::isAdminOEmpleado()) {

            if (isset($_POST)) {
                $nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : false;
                $descripcion = isset($_POST['txtDescripcion']) ? $_POST['txtDescripcion'] : false;
                $ano_estudio = isset($_POST['cbAno']) ? $_POST['cbAno'] : false;
                $archivo = isset($_POST['txtArchivo']) ? $_POST['txtArchivo'] : false;
                $enlace = isset($_POST['txtEnlace']) ? $_POST['txtEnlace'] : false;
                $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
//            $img1 = isset($_POST['img1']) ? $_POST['img1'] : false;

                if ($nombre && $descripcion && $ano_estudio) {
                    $estudio = new Estudio();
                    $estudio->setNombre($nombre);
                    $estudio->setDescripcion($descripcion);
                    $estudio->setAno_estudio($ano_estudio);

                    //Guardar el documento


                    //Preguntar si viene el parametro ID por get, si es asi, esto seria una modificacion del estudio.
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $estudio->setId($id);
                        if ($_FILES['img'] != null) {
                            $archivo = $_FILES['archivo'];
                            $nombre_archivo_raw = $archivo['name'];
                            $nombre_archivo = preg_replace('/\s+/', '', $nombre_archivo_raw);
                            $tipo_archivo = $archivo['type'];

                            if ($tipo_archivo == "image/jpg" || $tipo_archivo == "image/jpeg" || $tipo_archivo == "image/png") {
                                $genero = utils::getGeneroById($cancion->getGenero_idGenero());
                                $genero_nombre = $genero->Genero;
                                if (!is_dir('uploads/images/portadas/' . $genero_nombre)) {
                                    mkdir('uploads/images/portadas/' . $genero_nombre, 0777, true);
                                }
                                if (file_exists('uploads/images/portadas/' . $genero_nombre . '/' . $nombre_archivo)) {
                                    unlink('uploads/images/portadas/' . $genero_nombre . '/' . $nombre_archivo);
                                    move_uploaded_file($archivo['tmp_name'], 'uploads/images/portadas/' . $genero_nombre . '/' . $nombre_archivo);
                                    $can = new Cancion();
                                    $can->setIdCancion($id);
                                    $can1 = $can->getCancionById();
                                    $img_antigua = $can1->Imagen;
                                    unlink('uploads/images/portadas/' . $genero_nombre . '/' . $img_antigua . '');
                                    $cancion->setImagen($nombre_archivo);
                                } else {
                                    move_uploaded_file($archivo['tmp_name'], 'uploads/images/portadas/' . $genero_nombre . '/' . $nombre_archivo);
                                    $can = new Cancion();
                                    $can->setIdCancion($id);
                                    $can1 = $can->getCancionById();
                                    $img_antigua = $can1->Imagen;
                                    unlink('uploads/images/portadas/' . $genero_nombre . '/' . $img_antigua . '');
                                    $cancion->setImagen($nombre_archivo);
                                }
                            } else {
                                $_SESSION['resultado_crear_producto'] = "fallo_tipo_archivo";
                            }
                        }
                        $modify = $cancion->update();
                    } else {
                        if ($_FILES['archivo'] != null) {
                            $archivo = $_FILES['archivo'];
                            $nombre_archivo_raw = $archivo['name'];
                            $nombre_archivo = preg_replace('/\s+/', '', $nombre_archivo_raw);
                            $tipo_archivo = $archivo['type'];

                            if ($tipo_archivo == "image/jpg" || $tipo_archivo == "image/jpeg" || $tipo_archivo == "image/png") {
                                $genero = utils::getGeneroById($cancion->getGenero_idGenero());
                                $genero_nombre = $genero->Genero;
                                if (!is_dir('uploads/images/portadas/' . $genero_nombre)) {
                                    mkdir('uploads/images/portadas/' . $genero_nombre, 0777, true);
                                }
                                if (file_exists('uploads/images/portadas/' . $genero_nombre . '/' . $nombre_archivo)) {
                                    unlink('uploads/images/portadas/' . $genero_nombre . '/' . $nombre_archivo);
                                    move_uploaded_file($archivo['tmp_name'], 'uploads/images/portadas/' . $genero_nombre . '/' . $nombre_archivo);
                                    $cancion->setImagen($nombre_archivo);
                                } else {
                                    move_uploaded_file($archivo['tmp_name'], 'uploads/images/portadas/' . $genero_nombre . '/' . $nombre_archivo);
                                    $cancion->setImagen($nombre_archivo);
                                }
                            } else {
                                $_SESSION['resultado_crear_producto'] = "fallo_tipo_archivo";
                            }
                        }
                        $save = $cancion->save();
                    }

                    if (isset($save) && $save == true) {
                        $_SESSION['producto_mensaje'] = 'exito crear';
                    } elseif ($save == false & $save != null) {
                        $_SESSION['producto_mensaje'] = 'fallo';
                    }

                    if (isset($modify) && $modify == true) {
                        $_SESSION['producto_mensaje'] = 'exito modificar';
                    } elseif ($modify == false & $modify != null) {
                        $_SESSION['producto_mensaje'] = 'fallo modificar';
                    }
                } else {
                    $_SESSION['producto_mensaje'] = 'fallo crear datos';
                    header("Location:" . base_url . home);
                }
                header("Location:" . base_url . 'cancion/gestion');
            } else {
                header("Location:" . base_url . home);
            }
        }
    }
}