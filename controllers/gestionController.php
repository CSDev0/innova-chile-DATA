<?php

ob_start();

require_once 'models/Usuario.php';
require_once 'models/Estudio.php';
require_once 'models/Log.php';
require_once 'models/Web.php';
require_once 'models/Repositorio.php';

class gestionController {

    function usuarios() {
        if (utils::isLogged()) {
            if (utils::isVerified()) {
                if (utils::isAdmin()) {
                    $usuario = new Usuario();
                    $usuarios = $usuario->getAll();
                    $log = new Log();
                    $logs = $log->getAll();
                    require_once("views/mensajes/usu_msg.php");

                    require_once('views/usuario/sidebar.php');
                    require_once('views/usuario/gestion-usuarios.php');
                    require_once('views/usuario/modal-agregar-usuario.php');
                    require_once('views/usuario/modal-modificar-usuario.php');
                    require_once('views/usuario/modal-ver-actividad.php');
                    require_once("views/mensajes/modal-eliminar.php");
                } else {
                    header("Location:" . base_url . 'usuario/panel');
                }
            } else {
                header("Location:" . base_url . 'usuario/verificarMiCuenta');
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

    function web() {
        if (utils::isVerified()) {
            if (utils::isAdminOEmpleado()) {
                require_once("views/mensajes/preg_msg.php");
                require_once("views/mensajes/web_msg.php");
                $web = new Web();
                require_once('views/usuario/sidebar.php');
                require_once('views/web/gestion-web.php');
                require_once('views/web/modal-agregar-pregunta.php');
                require_once('views/web/modal-modificar-pregunta.php');
                require_once("views/mensajes/modal-eliminar.php");
            } else {
                header("Location:" . base_url . 'web/login');
            }
        } else {
            header("Location:" . base_url . 'usuario/verificarMiCuenta');
        }
    }

    function estudios() {
        if (utils::isVerified()) {
            if (utils::isAdminOEmpleado()) {
                require_once("views/mensajes/estu_msg.php");

                $estudio = new Estudio();
                $estudios = $estudio->getAll();
                $estudios2 = $estudio->getAll();

                require_once('views/usuario/sidebar.php');
                require_once('views/estudios/gestion-estudios.php');
                require_once("views/estudios/modal-agregar-estudio.php");
                require_once("views/estudios/modal-modificar-estudio.php");
                require_once("views/estudios/modal-agregar-lectura.php");
                require_once("views/estudios/modal-modificar-lectura.php");
                require_once("views/mensajes/modal-eliminar.php");
            } else {
                header("Location:" . base_url . 'web/inicio');
            }
        } else {
            header("Location:" . base_url . 'usuario/verificarMiCuenta');
        }
    }

    function contenidos() {
        if (utils::isVerified()) {
            if (utils::isAdminOEmpleado()) {
                require_once("views/mensajes/cont_msg.php");
                require_once('views/usuario/sidebar.php');
                require_once('views/contenido/gestion-contenidos.php');
                require_once('views/contenido/modal-contenidos.php');
                require_once('views/contenido/modal-agregar-archivo.php');
                require_once('views/mensajes/modal-eliminar.php');
            } else {
                header("Location:" . base_url . 'web/inicio');
            }
        } else {
            header("Location:" . base_url . 'usuario/verificarMiCuenta');
        }
    }

    function data() {
        if (utils::isVerified()) {
            if (utils::isAdminOEmpleado()) {
                $datos = utils::getDatosDestacados();
                list($dato_millones, $dato_iniciativas, $dato_beneficiados) = $datos;
                require_once("views/mensajes/cont_msg.php");
                require_once("views/mensajes/repo_msg.php");
                require_once("views/mensajes/graf_msg.php");

                $repositorio = new Repositorio();
                $repositorio->setId('1');
                $repo = $repositorio->getRepoById()->fetch_object();

                require_once('views/usuario/sidebar.php');
                require_once('views/data/gestion-data.php');
                require_once 'views/data/modal-repositorio.php';
                require_once('views/data/modal-agregar-grafico.php');
                require_once 'views/mensajes/modal-eliminar.php';
            } else {
                header("Location:" . base_url . 'web/inicio');
            }
        } else {
            header("Location:" . base_url . 'usuario/verificarMiCuenta');
        }
    }

    function convocatorias(){
      if (utils::isVerified()) {
          if (utils::isAdminOEmpleado()) {
              require_once("views/mensajes/cont_msg.php");

              $repositorio = new Repositorio();
              $repositorio->setId('2');
              $repo = $repositorio->getRepoById()->fetch_object();

              require_once('views/usuario/sidebar.php');
              require_once('views/convocatorias/gestion-convocatorias.php');
              require_once('views/convocatorias/modal-repositorio.php');
              require_once('views/convocatorias/modal-agregar-convocatoria.php');
              require_once 'views/mensajes/modal-eliminar.php';

          } else {
              header("Location:" . base_url . 'web/inicio');
          }
      } else {
          header("Location:" . base_url . 'usuario/verificarMiCuenta');
      }
    }

}
