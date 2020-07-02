<?php

require_once 'models/Usuario.php';
require_once 'helpers/utils.php';

class usuarioController {

    function panel() {
        if (utils::isAdminOEmpleado()) {
            require_once ('views/usuario/sidebar.php');
            require_once ('views/usuario/mi-perfil.php');
        } else {
            header('Location:' . base_url . 'web/login');
        }
    }

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
                if ($_SESSION['identidad']->genero == 1) {
                    $_SESSION['aut_msg'] = 'e_login_a';
                }
                if ($_SESSION['identidad']->genero == 2) {
                    $_SESSION['aut_msg'] = 'e_login_o';
                }
                if ($_SESSION['identidad']->genero == 3) {
                    $_SESSION['aut_msg'] = 'e_login_@';
                }

                header('Location:' . base_url . 'usuario/panel');
            } else {
                $_SESSION['aut_msg'] = 'f_login';
                header('Location:' . base_url . 'web/login');
            }
        }
    }

//  Funcion para cerrar sesión.
    public function logout() {
        if (utils::isLogged()) {
            if (isset($_SESSION['identidad'])) {
                $now = new DateTime();
                $date = $now->format("Y-m-d H:i:s");
                require_once 'models/Log.php';
                $log = new Log();
                $log->setFecha($date);
                $log->setTipo('Cerrar sesión');
                $log->setUsuario_id($_SESSION['identidad']->id);
                $log->save();
                unset($_SESSION['identidad']);
                unset($_SESSION['tipo_usuario']);
                $_SESSION['aut_msg'] = 'e_logout';

                header("Location:" . base_url . 'web/inicio');
            }
        } else {
            $_SESSION['aut_msg'] = 'f_logout';
            header('Location:' . base_url . 'web/inicio');
        }
    }

//  Funcion para guardar un usuario siendo un administrador.
    public function save() {
        
        if (utils::isAdmin()) {
            if (isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setRut($_POST['txtRut']);
                $usuario->setNombre($_POST['txtNombre']);
                $usuario->setApellido($_POST['txtApellido']);
                $usuario->setCorreo($_POST['txtCorreo']);
                $usuario->setClave($_POST['txtClave']);
                $usuario->setGenero($_POST['slcGenero']);
                $usuario->setActivado($_POST['slcActivado']);
                $usuario->setTipo('empleado');

                $resultado = $usuario->save();
                if ($resultado) {
                    $_SESSION['usu_msg'] = "e_agregar";
                } else {
                    $_SESSION['usu_msg'] = "f_agregar";
                }
            }
            header("Location:" . base_url . 'gestion/usuarios');
        } else {
            header('Location:' . base_url . 'web/inicio');
        }
    }

    public function update() {
        if (utils::isAdmin()) {
            if (isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setId($_POST['txtId']);
                $usuario->setRut($_POST['txtRut']);
                $usuario->setNombre($_POST['txtNombre']);
                $usuario->setApellido($_POST['txtApellido']);
                $usuario->setCorreo($_POST['txtCorreo']);
                $usuario->setGenero($_POST['slcGenero']);
                $usuario->setActivado($_POST['slcActivado']);
                $resultado = $usuario->update();
                if ($resultado) {
                    $_SESSION['usu_msg'] = "e_modificar";
                } else {
                    $_SESSION['usu_msg'] = "f_modificar";
                }
            }
            header("Location:" . base_url . 'gestion/usuarios');
        } else {
            header('Location:' . base_url . 'web/inicio');
        }
    }

    #Borrar usuario
    public function delete() {
        if (utils::isAdmin()) {
            if (isset($_POST)) {
                $usuario = new Usuario();
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $usuario->setId($id);
                    $usu = $usuario->getUsuarioById()->fetch_object();
                    if($usu->tipo === 'admin'){
                        $_SESSION['usu_msg'] = "f_admin";
                        header("Location:" . base_url . 'gestion/usuarios');
                    }else{
                        $delete = $usuario->delete();
                    }
                    
                } else {
                    $_SESSION['usu_msg'] = "f_no_encontrado";
                }

                if (isset($delete) && $delete == true) {
                    $_SESSION['usu_msg'] = 'e_eliminar';
                } elseif ($delete == false & $delete != null) {
                    $_SESSION['usu_msg'] = 'f_eliminar';
                }
            }
            header("Location:" . base_url . 'gestion/usuarios');
        } else {
            header('Location:' . base_url . 'usuario/panel');
        }
    }

}
