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
                    $_SESSION['autenticacion_mensaje'] = 'exito login a';
                }
                if ($_SESSION['identidad']->genero == 2) {
                    $_SESSION['autenticacion_mensaje'] = 'exito login o';
                }
                if ($_SESSION['identidad']->genero == 3) {
                    $_SESSION['autenticacion_mensaje'] = 'exito login @';
                }

                header('Location:' . base_url . 'usuario/panel');
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
                $_SESSION['autenticacion_mensaje'] = 'exito logout';

                header("Location:" . base_url . 'web/inicio');
            }
        } else {
            $_SESSION['autenticacion_mensaje'] = 'fallo logout';
            header('Location:' . base_url . 'web/inicio');
        }
    }

//  Funcion para guardar un usuario siendo un administrador.
# setTipo-> $_POST['radioTipo'] en toria todos los nuevos usuarios son de tipo normal y no admins
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
                    $_SESSION['usuario_mensaje'] = "exito crear";
                } else {
                    $_SESSION['usuario_mensaje'] = "fallo crear";
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
                    $_SESSION['usuario_mensaje'] = "exito modificar";
                } else {
                    $_SESSION['usuario_mensaje'] = "fallo modificar";
                }
            }
            header("Location:" . base_url . 'gestion/usuarios');
        } else {
            header('Location:' . base_url . 'web/inicio');
        }
    }

    #Borrar usuario??

    public function delete() {
        if (utils::isAdmin()) {
            if (isset($_POST)) {
                $usuario = new Usuario();
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $usuario->setId($id);
                    $usu = $usuario->getUsuarioById()->fetch_object();
                    if($usu->tipo === 'admin'){
                        $_SESSION['usuario_mensaje'] = "fallo admin";
                        header("Location:" . base_url . 'gestion/usuarios');
                    }else{
                        $delete = $usuario->delete();
                    }
                    
                } else {
                    $_SESSION['usuario_mensaje'] = "no encontrado";
                }

                if (isset($delete) && $delete == true) {
                    $_SESSION['usuario_mensaje'] = 'exito eliminar';
                } elseif ($delete == false & $delete != null) {
                    $_SESSION['usuario_mensaje'] = 'fallo eliminar';
                }
            }

            header("Location:" . base_url . 'gestion/usuarios');
        } else {
            header('Location:' . base_url . 'usuario/panel');
        }
    }

    public function buscar() {
        return "error";
    }

}
