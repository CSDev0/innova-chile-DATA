<?php
require_once('models/Contenido.php');

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
        if (isset($_SESSION['tipo_usuario'])) {
            if ($_SESSION['tipo_usuario'] == 'admin' || $_SESSION['tipo_usuario'] == 'empleado') {
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

    public static function getTextoByTipoContenido($tipo){
        $contenido = new Contenido();
        $contenido->setTipo($tipo);
        $cont = $contenido->getContenidoByTipo();
        if($cont != null){
            $texto = $cont->texto;
        }else{
            $texto = "No hay texto predefinido.";
        }
        return $texto;
    }
}
