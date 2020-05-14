<?php

class utils {
    public static function isActived(){
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
}
