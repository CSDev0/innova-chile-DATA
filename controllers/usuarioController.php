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
                $_SESSION['autenticacion_mensaje'] = 'exito login';
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
    public function saveUsuario() {
        if (utils::isAdmin()) {
            if (isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setRut($_POST['txtRut']);
                $usuario->setNombre($_POST['txtNombre']);
                $usuario->setApellido($_POST['txtApellido']);
                $usuario->setCorreo($_POST['txtCorreoRegistro']);
                $usuario->setClave($_POST['txtClaveRegistro']);
                if ($_POST['slcEstado']=='Habilitado') {
                  $usuario->setActivado('1');
                }else {
                  $usuario->setActivado('0');
                }

                $usuario->setTipo('empleado');
                $resultado = $usuario->save();
                if ($resultado) {
                    $_SESSION['usuario_mensaje'] = "exito crear";

                } else {
                    $_SESSION['usuario_mensaje'] = "fallo crear";

                    echo $usuario->getActivado();
                }
            }
            header("Location:" . base_url . 'gestion/usuarios');
        } else {
            header('Location:' . base_url . 'web/inicio');
        }
    }

    #Borrar usuario??

    public function deleteUsuario() {
      if (utils::isAdmin()) {
          if (isset($_POST)) {
              $usuario = new Usuario();
              if (isset($_GET['id'])) {
                  $id = $_GET['id'];
                  $usuario->setId($id);
                  $delete = $usuario->delete($usuario->getId());
              } else {
                    $_SESSION['usuario_mensaje'] = "No se ah encontrado usuario";
              }

              if (isset($delete) && $delete == true) {
                  $_SESSION['usuario_mensaje'] = 'exito al borrar';
              } elseif ($update == false & $update != null) {
                  $_SESSION['usuario_mensaje'] = 'fallo al borrar';
              }
          }
          header("Location:" . base_url . 'usuario/gestion');
      } else {
            header('Location:' . base_url . 'web/inicio');
        }
    }


    #ver usuarios??

    public function showUsers()
    {
      if (utils::isAdmin()) {
        $usuario = new Usuario();
        $usuarios = $usuario->getAll();
        require_once('views/usuario/ver-usuarios.php');
      }else {
        $_SESSION['usuario_mensaje'] = 'Funcion no autorizada';
      }
    }

}
