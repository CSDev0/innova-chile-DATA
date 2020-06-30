<?php

ob_start();

require_once 'models/Grafico_destacado.php';
require_once 'models/Repositorio.php';
require_once 'helpers/utils.php';

class dataController {

    function updateRepo() {
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
                $resultado = $repo->update();
                if (isset($resultado) && $resultado == true) {
                    $_SESSION['repo_mensaje'] = 'exito_modificar';
                } elseif ($resultado == false & $resultado != null) {
                    $_SESSION['repo_mensaje'] = 'fallo_modificar';
                }
                header("Location:" . base_url . 'gestion/data');
            }
        }
    }

    function downloadAndUnzip() {
        require_once 'models/Repositorio.php';
        $repositorio = new Repositorio();
        $repositorio->setId('1');
        $repo = $repositorio->getRepoById()->fetch_object();
        file_put_contents("uploads/repo/master.zip",
                file_get_contents("https://github.com/".$repo->usuario."/".$repo->repositorio."/archive/master.zip")
        );
        $zip = new ZipArchive;
        if ($zip->open('uploads/repo/master.zip') === TRUE) {
            $zip->extractTo('uploads/repo/');
            $zip->close();
            $_SESSION['repo_mensaje'] = 'exito_unzip';
            header("Location:" . base_url . 'gestion/data');
        } else {
            $_SESSION['repo_mensaje'] = 'error_unzip';
            header("Location:" . base_url . 'gestion/data');
        }
    }

}
