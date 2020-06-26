<?php

class utils {

    public static function isActived() {
        if ($_SESSION['identidad']->ACTIVADO == 1) {
            return true;
        } else {
            $_SESSION['autenticacion_mensaje'] = 'fallo no activada';
            return false;
        }
    }

    public static function isAdmin() {
        if (isset($_SESSION['tipo_usuario'])) {
            if ($_SESSION['tipo_usuario'] == 'admin') {
                return true;
            } else {
                $_SESSION['autenticacion_mensaje'] = 'fallo restringido';
                return false;
            }
        } else {
            $_SESSION['autenticacion_mensaje'] = 'sesion no iniciada';
            return false;
        }
    }

    public static function isAdminOEmpleado() {
        if (isset($_SESSION['tipo_usuario']) & isset($_SESSION['identidad']) & $_SESSION['identidad']->nombre != null) {
            if ($_SESSION['tipo_usuario'] == 'admin' || $_SESSION['tipo_usuario'] == 'empleado') {
                return true;
            } else {
                $_SESSION['autenticacion_mensaje'] = 'fallo restringido';
                return false;
            }
        } else {
            unset($_SESSION['identidad']);
            unset($_SESSION['tipo_usuario']);
            $_SESSION['autenticacion_mensaje'] = 'sesion no iniciada';
            return false;
        }
    }

    public static function isEmpleado() {
        if (isset($_SESSION['tipo_usuario'])) {
            if ($_SESSION['tipo_usuario'] == 'empleado') {
                return true;
            } else {
                $_SESSION['autenticacion_mensaje'] = 'fallo restringido';
                return false;
            }
        } else {
            $_SESSION['autenticacion_mensaje'] = 'sesion no iniciada';
            return false;
        }
    }

    public static function isLogged() {
        if (isset($_SESSION['identidad'])) {
            return true;
        } else {
            $_SESSION['autenticacion_mensaje'] = 'sesion no iniciada';
            return false;
        }
    }

    public static function getNombreCompleto() {
        if (isset($_SESSION['identidad'])) {
            $nombre = $_SESSION['identidad']->nombre . ' ' . $_SESSION['identidad']->apellido;
            return $nombre;
        } else {
            return false;
        }
    }

    // Start function
    public static function acortador($text, $chars_limit) {
        // Check if length is larger than the character limit
        if (strlen($text) > $chars_limit) {
            // If so, cut the string at the character limit
            $new_text = substr($text, 0, $chars_limit);
            // Trim off white space
            $new_text = trim($new_text);
            // Add at end of text ...
            return $new_text . "...";
        }
        // If not just return the text as is
        else {
            return $text;
        }
    }

    public static function getTextoByTipoContenido($tipo) {
        require_once ('models/Contenido.php');
        $contenido = new Contenido();
        $contenido->setTipo($tipo);
        $cont = $contenido->getContenidoByTipo();
        if ($cont != null) {
            $resultado = $cont->texto;
        } else {
            $resultado = false;
        }
        return $resultado;
    }

    public static function getContenidoByTipo($tipo) {
        require_once ('models/Contenido.php');
        $contenido = new Contenido();
        $contenido->setTipo($tipo);
        $cont = $contenido->getContenidoByTipo();
        if ($cont != null) {
            $resultado = $cont;
        } else {
            $resultado = false;
        }
        return $resultado;
    }

    public static function getUsuarioNombre($id) {
        $usuario = new Usuario();
        $usuario->setId($id);
        $usu = $usuario->getUsuarioById()->fetch_object();
        if ($usu != null) {
            $nombre_usuario = $usu->nombre . " " . $usu->apellido;
        } else {
            $nombre_usuario = "Desconocido.";
        }
        return $nombre_usuario;
    }

    public static function getTiempo($ultima_modificacion) {
        $ultima_modificacion = new DateTime($ultima_modificacion);

        $fecha = $ultima_modificacion->format('Y-m-d');
        $hora = $ultima_modificacion->format('H:i A');
        $now = new DateTime;
        $now->setTime(0, 0, 0);
        $ultima_modificacion->setTime(0, 0, 0);
        if ($now->diff($ultima_modificacion)->days === 0) {
            $fecha_dia = 'Hoy a las ' . $hora;
        } elseif ($now->diff($ultima_modificacion)->days === -1) {
            $fecha_dia = 'Ayer a las ' . $hora;
        } elseif ($now->diff($ultima_modificacion)->days === 1) {
            $fecha_dia = 'Ayer a las ' . $hora;
        } else {
            $fecha_dia = $fecha . ' a las ' . $hora;
        }
        return $fecha_dia;
    }

    public static function getTitulo() {
      require_once ('models/Web.php');
      $web = new Web();
      $web->setId(1);
      $info=$web->getOne();
      $titulo=$info->nombre_web;
      echo $titulo;
    }

    public static function getOtros() {
      require_once ('models/Web.php');
      $web = new Web();
      $web->setId(1);
      $info=$web->getOne();
      $otros=explode(',',$info->pie_pagina);
      for ($i=0; $i < count($otros) ; $i++) {
        echo '<i class="fa fa-angle-double-right" style="color: #0062AB"></i><a class="link-normal" href="#">'.$otros[$i].'</a><br>';
      }
    }
    public static function getLinks() {
      require_once ('models/Web.php');
      $web = new Web();
      $web->setId(1);
      $info=$web->getOne();
      echo '<i class="fab fa-facebook-square fa-4x color-azul">'.$info->fb_link.'</i><i class="fab fa-instagram-square fa-4x color-ig">'.$info->ig_link.'</i><i class="fab fa-twitter-square fa-4x color-azul-claro">'.$info->twt_link.'</i>';
    }

}
