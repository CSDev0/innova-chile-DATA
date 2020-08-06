<?php

ob_start();

require_once 'models/Grafico_destacado.php';
require_once 'models/Repositorio.php';
require_once 'helpers/utils.php';

class dataController {

    function updateRepo() {
        if (utils::isAdminOEmpleado()) {
            $now = new DateTime();
            $date = $now->format("Y-m-d H:i:s");
            if (isset($_POST)) {
                $usuario = isset($_POST['txtUsuario']) ? $_POST['txtUsuario'] : false;
                $repositorio = isset($_POST['txtRepositorio']) ? $_POST['txtRepositorio'] : false;
                $usuario_id = $_SESSION['identidad']->id;

                if ($usuario && $repositorio) {
                    $repo = new Repositorio();

                    $repo->setUsuario($usuario);
                    $repo->setRepositorio($repositorio);
                    $repo->setUltima_modificacion($date);
                    $repo->setUsuario_id($usuario_id);
                    $repo->setId('1');
                    $resultado = $repo->update();
                    if (isset($resultado) && $resultado == true) {
                        $_SESSION['repo_mensaje'] = 'e_modificar';
                    } elseif ($resultado == false & $resultado != null) {
                        $_SESSION['repo_mensaje'] = 'f_modificar';
                    }
                    header("Location:" . base_url . 'gestion/data');
                }
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

    function downloadAndUnzip() {
        if (utils::isAdminOEmpleado()) {
            $repositorio = new Repositorio();
            $repositorio->setId('1');
            $repo = $repositorio->getRepoById()->fetch_object();
            try {
                file_put_contents("uploads/repo/master.zip",
                        file_get_contents("https://github.com/" . $repo->usuario . "/" . $repo->repositorio . "/archive/master.zip")
                );
            } catch (Exception $ex) {
                $_SESSION['repo_mensaje'] = 'f_repositorio';
            }
            $zip = new ZipArchive;
            if ($zip->open('uploads/repo/master.zip') === TRUE) {
                $zip->extractTo('uploads/repo/');
                $zip->close();
                $_SESSION['repo_mensaje'] = 'e_unzip';
                header("Location:" . base_url . 'gestion/data');
            } else {
                $_SESSION['repo_mensaje'] = 'f_unzip';
                header("Location:" . base_url . 'gestion/data');
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

    function saveGrafico() {
        if (isset($_POST)) {
            if (utils::isAdminOEmpleado()) {
                $grafico = new Grafico_destacado();
                $grafico->setArchivo($_POST['slcArchivo']);
                $grafico->setPosicion('0');
                $grafico->setSeccion($_POST['slcSeccion']);
                $resultado = $grafico->save();
                if ($resultado) {
                    $_SESSION['graf_msg'] = 'e_agregar';
                } else {
                    $_SESSION['graf_msg'] = 'f_agregar';
                }
                header("Location:" . base_url . 'gestion/data');
            } else {
                header("Location:" . base_url . 'gestion/data');
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

    function deleteGrafico() {
        if (utils::isAdminOEmpleado()) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $grafico = new Grafico_destacado();
                $grafico->setId($id);
                $resultado = $grafico->delete();
                if ($resultado) {
                    $_SESSION['graf_msg'] = 'e_eliminar';
                    header("Location:" . base_url . 'gestion/data');
                } else {
                    $_SESSION['graf_msg'] = 'f_eliminar';
                    header("Location:" . base_url . 'gestion/data');
                }
            } else {
                $_SESSION['graf_msg'] = 'f_eliminar';
                header("Location:" . base_url . 'gestion/data');
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

}
