<?php

require_once 'models/Usuario.php';
require_once 'models/Token.php';
require_once 'helpers/utils.php';

class usuarioController {

    function panel() {
        if (utils::isVerified()) {
            if (utils::isAdminOEmpleado()) {
                require_once ('views/layout/sidebar.php');
                require_once ('views/usuario/mi-perfil.php');
            } else {
                header('Location:' . base_url . 'web/login');
            }
        } else {
            header("Location:" . base_url . 'usuario/verificarMiCuenta');
        }
    }

//  Funcion para enviar los datos de inicio de sesión.
    function loginRequest() {
        if (isset($_POST)) {
            $res = utils::post_captcha($_POST['g-recaptcha-response']);
            if (!$res['success']) {
                header('Location:' . base_url . 'web/login');
                $_SESSION['aut_msg'] = 'f_captcha';
            } else {
            $usuario = new Usuario();
            $usuario->setCorreo($_POST['txtCorreo']);
            $usuario->setClave($_POST['txtClave']);
            $identidad = $usuario->login();
            if ($identidad && is_object($identidad)) {
                $_SESSION['identidad'] = $identidad;
                $_SESSION['tipo_usuario'] = $identidad->tipo;

                if (utils::isVerified()) {
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
                    $_SESSION['usu_msg'] = 'w_debes_verificar';
                    header('Location:' . base_url . 'usuario/verificarMiCuenta');
                }
            } else {
                $_SESSION['aut_msg'] = 'f_login';
                header('Location:' . base_url . 'web/login');
            }
        }
        }
    }

//  Funcion para cerrar sesión.
    function logout() {
        if (utils::isLogged()) {
            if (isset($_SESSION['identidad'])) {
                $now = new DateTime();
                $date = $now->format("Y-m-d H:i:s");
                require_once 'models/Log.php';
                $log = new Log();
                $log->setFecha($date);
                $log->setTipo( 'Cerrar sesión');
                $log->setActividad("<i class='icon-fa color-rojo'>&#xf0a8;</i> ".$_SESSION['identidad']->nombre." ".$_SESSION['identidad']->apellido." ha cerrado sesión.");
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
    function save() {
        if (utils::isAdmin()) {
            if (isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setRut($_POST['txtRut']);
                $usuario->setNombre($_POST['txtNombre']);
                $usuario->setApellido($_POST['txtApellido']);
                $usuario->setCorreo($_POST['txtCorreo']);
                $usuario->setClave($_POST['txtClave']);
                $usuario->setGenero($_POST['slcGenero']);
                $usuario->setHabilitado($_POST['slcActivado']);
                $usuario->setVerificado(0);
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

    function update() {
        if (utils::isAdmin()) {
            if (isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setId($_POST['txtId']);
                $usuario->setRut($_POST['txtRut']);
                $usuario->setNombre($_POST['txtNombre']);
                $usuario->setApellido($_POST['txtApellido']);
                $usuario->setCorreo($_POST['txtCorreo']);
                $usuario->setGenero($_POST['slcGenero']);
                $usuario->setHabilitado($_POST['slcActivado']);
                $usuario->setVerificado(0);
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
    function delete() {
        if (utils::isAdmin()) {
                $usuario = new Usuario();
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $usuario->setId($id);
                    $usu = $usuario->getUsuarioById()->fetch_object();
                    if ($usu->tipo === 'admin') {
                        $_SESSION['usu_msg'] = "f_admin";
                        header("Location:" . base_url . 'gestion/usuarios');
                    } else {
                        $delete = $usuario->delete();
                    }
                } else {
                    $_SESSION['usu_msg'] = "f_no_encontrado";
                    header('Location:' . base_url . 'gestion/usuarios');
                }
                if (isset($delete) && $delete == true) {
                    $_SESSION['usu_msg'] = 'e_eliminar';
                } elseif ($delete == false & $delete != null) {
                    $_SESSION['usu_msg'] = 'f_eliminar';
                }
                header('Location:' . base_url . 'gestion/usuarios');
        } else {
            header('Location:' . base_url . 'usuario/panel');
        }
    }

    function enviarCodigoActivar() {
        if (utils::isLogged()) {
            if (isset($_GET['id'])) {
                $id_usuario = $_GET['id'];
                $usuario = new Usuario();
                $usuario->setId($id_usuario);
                $usu = $usuario->getUsuarioById();
                $usu = $usu->fetch_object();
                if ($usu) {
                    $expiry_date = Date('Y-m-d H:i', strtotime('+1 days'));
                    $token_key = rand(1000000, 9999999);
                    $token = new Token();
                    $token->setCorreo($usu->correo);
                    $token->setToken_key($token_key);
                    $token->setExpira($expiry_date);
                    $tok = $token->save();
                    $tok = true;
                    if ($tok) {
                        require_once 'helpers/config_correo.php';
                        require_once 'helpers/correos/enviarCodigoActivar.php';
                        $mail->setFrom(soporte_correo, 'DataInnovación'); // Set the sender of the message.
                        $mail->addAddress($usu->correo, 'Activa tu cuenta!'); // Set the recipient of the message.
                        $mail->Body = $correo_mensaje;
                        $mail->Subject = 'Activa tu cuenta - DataInnovación'; // The subject of the message.

                        if ($mail->send()) {
                            $_SESSION['usu_msg'] = 'e_enviar_codigo';
                            header("Location:" . base_url . 'gestion/usuarios');
                        } else {
                            $_SESSION['usu_msg'] = 'f_enviar_codigo';
                            header("Location: " . base_url . 'gestion/usuarios');
                        }
                    } else {
                        $_SESSION['usu_msg'] = 'f_enviar_codigo';
                        header("Location: " . base_url . 'gestion/usuarios');
                    }
                } else {
                    $_SESSION['usu_msg'] = 'f_no_encontrado';
                    header("Location: " . base_url . 'gestion/usuarios');
                }
            } else {
                header("Location: " . base_url . 'gestion/usuarios');
            }
        }
    }

    function verificarMiCuenta() {
        if (utils::isLogged()) {
            if (utils::isVerified()) {
                header("Location: " . base_url . 'usuario/panel');
            } else {
                require_once 'views/usuario/verificar-cuenta.php';
            }
        } else {
            header("Location: " . base_url . 'web/inicio');
        }
    }

    function TokenVerificarCuenta() {
        if (isset($_POST['txtToken']) || isset($_SESSION['token'])) {
            if (isset($_POST['txtToken'])) {
                $token_key = $_POST['txtToken'];
                $_SESSION['token_key'] = $token_key;
            } else {
                if (isset($_SESSION['token_key'])) {
                    $token_key = $_SESSION['token_key'];
                } else {
                    $_SESSION['usu_msg'] = 'f_token';
                    header("Location: " . base_url . 'web/inicio');
                }
            }
            $token = new Token();
            $token->setToken_key($token_key);
            $tok = $token->getTokenByToken_key();
            if ($tok) {
                $tok = $tok->fetch_object();
            } else {
                $_SESSION['usu_msg'] = 'f_token';
                header("Location: " . base_url . 'usuario/verificarMiCuenta');
            }
            if ($tok && $tok->token_key == $token_key) {
                $usuario = new Usuario();
                $usuario->setCorreo($tok->correo);
                $usu = $usuario->getUsuarioByCorreo();
                if ($usu) {
                    $usuario->verificar();
                    if (isset($_SESSION['identidad'])) {
                        $_SESSION['identidad']->verificado = 1;
                    } else {
                        $usu = $usu->fetch_object();
                        $_SESSION['identidad'] = $usu;
                        $_SESSION['identidad']->verificar = 1;
                    }
                    $token->setCorreo($tok->correo);
                    $token->delete();
                    $_SESSION['usu_msg'] = 'e_verificar';
                    header("Location: " . base_url . 'usuario/panel');
                } else {
                    $_SESSION['usu_msg'] = 'f_verificar';
                    header("Location: " . base_url . 'web/inicio');
                }
            } else {
                $_SESSION['usu_msg'] = 'f_token';
                header("Location: " . base_url . 'usuario/verificarMiCuenta');
            }
        } else {
            header("Location: " . base_url . 'web/inicio');
        }
    }

    function solicitarRestablecer() {
        $res = utils::post_captcha($_POST['g-recaptcha-response']);
        if (!$res['success']) {
            header('Location:' . base_url . 'web/login');
            $_SESSION['aut_msg'] = 'f_captcha';
        } else {
            if (isset($_POST['txtCorreoRestablecer'])) {
                $correo_restablecer = $_POST['txtCorreoRestablecer'];
                $usuario = new Usuario();
                $usuario->setCorreo($correo_restablecer);
                $usu = $usuario->getUsuarioByCorreo();
                $usu = $usu->fetch_object();
                if ($usu != null && $usu != false) {
                    $expiry_date = Date('Y-m-d H:i', strtotime('+1 days'));
                    $token_key = rand(1000000, 9999999);
                    $token = new Token();
                    $token->setCorreo($usu->correo);
                    $token->setToken_key($token_key);
                    $token->setExpira($expiry_date);
                    $tok = $token->save();
                    $tok = true;
                    if ($tok) {
                        require_once 'helpers/config_correo.php';
                        require_once 'helpers/correos/enviarCodigoRestablecer.php';
                        $mail->setFrom(soporte_correo, 'DataInnovación'); // Set the sender of the message.
                        $mail->addAddress($usu->correo, 'Restablece tu clave!'); // Set the recipient of the message.
                        $mail->Body = $correo_mensaje;
                        $mail->Subject = 'Restablece tu clave - DataInnovación'; // The subject of the message.

                        if ($mail->send()) {
                            $_SESSION['usu_msg'] = 'e_enviar_codigo';
                            header("Location:" . base_url . 'web/login');
                        } else {
                            $_SESSION['usu_msg'] = 'f_enviar_codigo';
                            header("Location:" . base_url . 'web/login');
                        }
                    } else {
                        $_SESSION['usu_msg'] = 'f_enviar_codigo';
                        header("Location:" . base_url . 'web/login');
                    }
                } else {
                    $_SESSION['usu_msg'] = 'f_no_encontrado';
                    header("Location:" . base_url . 'web/login');
                }
            }
        }
    }

    function solicitarRestablecerAutenticado() {
        if (utils::isLogged()) {
            $correo_restablecer = $_SESSION['identidad']->correo;
            $expiry_date = Date('Y-m-d H:i', strtotime('+1 days'));
            $token_key = rand(1000000, 9999999);
            $token = new Token();
            $token->setCorreo($correo_restablecer);
            $token->setToken_key($token_key);
            $token->setExpira($expiry_date);
            $tok = $token->save();
            if ($tok) {
                require_once 'helpers/config_correo.php';
                require_once 'helpers/correos/enviarCodigoRestablecer.php';
                $mail->setFrom(soporte_correo, 'DataInnovación'); // Set the sender of the message.
                $mail->addAddress($correo_restablecer, 'Restablece tu clave!'); // Set the recipient of the message.
                $mail->Body = $correo_mensaje;
                $mail->Subject = 'Restablece tu clave - DataInnovación'; // The subject of the message.
                if ($mail->send()) {
                    $_SESSION['usu_msg'] = 'e_enviar_codigo';
                    header("Location:" . base_url . 'usuario/panel');
                } else {
                    $_SESSION['usu_msg'] = 'f_enviar_codigo';
                    header("Location:" . base_url . 'usuario/panel');
                }
            } else {
                $_SESSION['usu_msg'] = 'f_enviar_codigo';
                header("Location:" . base_url . 'usuario/panel');
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

    function restablecerIngresarCodigo() {
        require_once 'views/usuario/restablecer-clave/ingresar-codigo-restablecer.php';
    }

    function TokenRestablecerClave() {
        if (isset($_POST['txtToken']) || isset($_SESSION['token_key'])) {
            if (isset($_POST['txtToken'])) {
                $token_key = $_POST['txtToken'];
                $_SESSION['token_key'] = $token_key;
            } else {
                if (isset($_SESSION['token_key'])) {
                    $token_key = $_SESSION['token_key'];
                } else {
                    $_SESSION['usu_msg'] = 'f_token';
                    header("Location: " . base_url . 'web/inicio');
                }
            }
            $token = new Token();
            $token->setToken_key($token_key);
            $tok = $token->getTokenByToken_key();
            if ($tok) {
                $tok = $tok->fetch_object();
            } else {
                $_SESSION['usu_msg'] = 'f_token';
                header("Location: " . base_url . 'web/login');
            }
            if ($tok && $tok->token_key == $token_key) {
                $usuario = new Usuario();
                $usuario->setCorreo($tok->correo);
                $usu = $usuario->getUsuarioByCorreo();
                $usu = $usu->fetch_object();
                if ($usu) {
                    $_SESSION['usu_msg'] = 'e_restablecer';
                    require_once 'views/usuario/restablecer-clave/nueva-clave.php';
                    ;
                } else {
                    $_SESSION['usu_msg'] = 'f_restablecer';
                    header("Location: " . base_url . 'usuario/restablecerIngresarCodigo');
                }
            } else {
                $_SESSION['usu_msg'] = 'f_token';
                header("Location: " . base_url . 'usuario/restablecerIngresarCodigo');
            }
        } else {
            $_SESSION['usu_msg'] = 'f_token';
            header("Location: " . base_url . 'web/login');
        }
    }

    function guardarClave() {
        if (isset($_SESSION['token_key'])) {
            if (isset($_POST['txtClave'])) {
                $id_usuario = $_POST['id_usuario'];
                $clave = $_POST['txtClave'];
                $clave_verificar = $_POST['txtClaveVerificar'];
                if ($clave == $clave_verificar) {
                    $usuario = new Usuario();
                    $usuario->setClave($clave);
                    $usuario->setId($id_usuario);
                    $usu = $usuario->updateClave();

                    if ($usu) {
                        $_SESSION['usu_msg'] = 'e_guardar_clave';
                        $token_key = $_SESSION['token_key'];
                        $token = new Token();
                        $token->setToken_key($token_key);
                        $tok = $token->getTokenByToken_key();
                        $tok = $tok->fetch_object();
                        if ($tok && $tok->token_key == $token_key) {
                            $usuario = new Usuario();
                            $usuario->setCorreo($tok->correo);
                            $usu = $usuario->getUsuarioByCorreo();
                            $usu = $usu->fetch_object();
                            $token->setCorreo($tok->correo);
                            $token->delete();
                            unset($_SESSION['token_key']);
                            header("Location: " . base_url . 'web/login');
                        } else {
                            $_SESSION['usu_msg'] = 'f_token';
                            header("Location: " . base_url . 'web/TokenRestablecerClave');
                        }
                    } else {
                        $_SESSION['usu_msg'] = 'f_guardar_clave';
                        header("Location: " . base_url . 'web/TokenRestablecerClave');
                    }
                } else {
                    $_SESSION['usu_msg'] = 'f_clave_verificar';
                    header("Location: " . base_url . 'usuario/TokenRestablecerClave');
                }
            }
        } else {
            $_SESSION['usu_msg'] = 'f_token';
            header("Location: " . base_url . 'web/login');
        }
    }

    function cancelarRestablecer() {
        $id_usuario = $_POST['id_usuario'];
        $usuario = new Usuario();
        $usuario->setId($id_usuario);
        $usu = $usuario->getUsuarioById();
        $usu = $usu->fetch_object();
        $token = new Token();
        $token->setCorreo($usu->correo);
        $token->delete();
        unset($_SESSION['token_key']);
        $_SESSION['usu_msg'] = 'e_cancelar_restablecer';
        header("Location: " . base_url . 'web/login');
    }

}
