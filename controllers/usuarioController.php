<?php

ob_start();

require_once 'models/Usuario.php';

class usuarioController {

//  Funcion para enviar los datos de inicio de sesión.
    function loginRequest() {
        if (isset($_POST)) {
            $usuario = new Usuario();
            $usuario->setCorreo($_POST['txtCorreo']);
            $usuario->setClave($_POST['txtClave']);
            $identidad = $usuario->login();
            if ($identidad && is_object($identidad)) {
                $_SESSION['identidad'] = $identidad;
                $_SESSION['tipo_usuario'] = $identidad->tipo;
                $_SESSION['autenticacion_mensaje'] = 'exito login';
                header('Location:' . base_url . 'web/panel');
            } else {
                $_SESSION['autenticacion_mensaje'] = 'fallo login';
                header('Location:' . base_url . 'web/login');
            }
            
        }
    }

//  Funcion para cerrar sesión.
    public function logout() {
        if (utils::isLogged()) {
            if (isset($_SESSION['identidad'])) {
                unset($_SESSION['identidad']);
                unset($_SESSION['tipo_usuario']);
                $_SESSION['autenticacion_mensaje'] = 'exito logout';
                header("Location:" . base_url . 'web/inicio');
            }
        } else {
            $_SESSION['autenticacion_mensaje'] = 'fallo logout';
            header('Location:' . base_url . 'web/inicio');
        }
    }

//  Funcion para guardar un usuario como admin.
    public function saveUsuario() {
        if (utils::isAdmin()) {
            if (isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setRut($_POST['txtRut']);
                $usuario->setNombre($_POST['txtNombre']);
                $usuario->setApellido($_POST['txtApellido']);
                $usuario->setCorreo($_POST['txtCorreoRegistro']);
                $usuario->setClave($_POST['txtClaveRegistro']);
                $usuario->setTipo($_POST['radioTipo']);
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $usuario->setId($id);
                    $update = $usuario->update();
                } else {
                    $resultado = $usuario->save();
                }
                if ($resultado) {
                    $_SESSION['usuario_mensaje'] = "exito crear";
                } else {
                    $_SESSION['usuario_mensaje'] = "fallo crear";
                }
                if (isset($update) && $update == true) {
                    $_SESSION['usuario_mensaje'] = 'exito modificar';
                } elseif ($update == false & $update != null) {
                    $_SESSION['usuario_mensaje'] = 'fallo modificar';
                }
            }
            header("Location:" . base_url . 'usuario/gestion');
        } else {
            header('Location:' . base_url . 'web/inicio');
        }
    }

}
ob_end_flush();