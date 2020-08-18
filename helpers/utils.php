<?php

class utils {

    public static function isVerified() {
        if ($_SESSION['identidad']->verificado == 1) {
            return true;
        } else {
            $_SESSION['usu_msg'] = 'w_debes_verificar';
            return false;
        }
    }

    public static function isAdmin() {
        if (isset($_SESSION['tipo_usuario'])) {
            if ($_SESSION['tipo_usuario'] == 'admin') {
                return true;
            } else {
                $_SESSION['aut_msg'] = 'f_restringido';
                return false;
            }
        } else {
            $_SESSION['aut_msg'] = 'f_no_login';
            return false;
        }
    }

    public static function isAdminOEmpleado() {
        if (isset($_SESSION['tipo_usuario']) & isset($_SESSION['identidad']) & $_SESSION['identidad']->nombre != null) {
            if ($_SESSION['tipo_usuario'] == 'admin' || $_SESSION['tipo_usuario'] == 'empleado') {
                return true;
            } else {
                $_SESSION['aut_msg'] = 'f_restringido';
                return false;
            }
        } else {
            unset($_SESSION['identidad']);
            unset($_SESSION['tipo_usuario']);
            $_SESSION['aut_msg'] = 'f_no_login';
            return false;
        }
    }

    public static function isEmpleado() {
        if (isset($_SESSION['tipo_usuario'])) {
            if ($_SESSION['tipo_usuario'] == 'empleado') {
                return true;
            } else {
                $_SESSION['aut_msg'] = 'f_restringido';
                return false;
            }
        } else {
            $_SESSION['aut_msg'] = 'f_no_login';
            return false;
        }
    }

    public static function isLogged() {
        if (isset($_SESSION['identidad'])) {
            return true;
        } else {
            $_SESSION['aut_msg'] = 'f_no_login';
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
        $info = $web->getOne();
        $titulo = $info->nombre_web;
        echo $titulo;
    }

    public static function getOtros() {
        require_once ('models/Web.php');
        $web = new Web();
        $web->setId(1);
        $info = $web->getOne();
        $otros = json_decode($info->pie_pagina, true);
        if ($otros != null) {
            
        } else {
            $otros = json_decode('{"0":["null","null"]}', true);
        }
        for ($i = 0; $i < count($otros); $i++) {
            echo '<i class="fa fa-angle-double-right color-blanco" ></i><a class="link-celeste" href="' . $otros["" . $i . ""][1] . '"> ' . $otros["" . $i . ""][0] . '</a><br>';
        }
    }

    public static function getLinks() {
        require_once ('models/Web.php');
        $web = new Web();
        $web->setId(1);
        $info = $web->getOne();
        echo '<a href="' . $info->fb_link . '"><i class="fab fa-facebook fa-2x fa-facebook mr-2"></i></a><a href="' . $info->ig_link . '"><i class="fab fa-instagram fa-2x fa-instagram mr-2"></i></a><a href="' . $info->twt_link . '"><i class="fab fa-twitter fa-2x fa-twitter mr-2"></i></a>';
    }

    public static function getLinksB() {
        require_once ('models/Web.php');
        $web = new Web();
        $web->setId(1);
        $info = $web->getOne();
        return $info;
    }

    public static function getTitulos() {
        require_once ('models/Web.php');
        $web = new Web();
        $web->setId(1);
        $info = $web->getOne();
        $otros = json_decode($info->pie_pagina, true);
        if ($otros != null) {
            
        } else {
            $otros = json_decode('{"0":["null","null"]}', true);
        }
        $v = 1;
        echo '<input type="hidden" id="counter" value="' . count($otros) . '">';
        for ($i = 0; $i < count($otros); $i++) {
            echo '<div id="TextBoxDivA' . $v . '"><input type="text" class="form-control mb-4" name="textboxA' . $v . '" id="textboxA' . $v . '" placeholder="titulo" value="' . $otros["" . $i . ""][0] . '"></div>';
            $v++;
        }
    }

    public static function getEnlace() {
        require_once ('models/Web.php');
        $web = new Web();
        $web->setId(1);
        $info = $web->getOne();
        $links = json_decode($info->pie_pagina, true);
        if ($links != null) {
            
        } else {
            $links = json_decode('{"0":["null","null"]}', true);
        }
        $v = 1;
        for ($i = 0; $i < count($links); $i++) {
            echo '<div id="TextBoxDivB' . $v . '"><input type="text" class="form-control mb-4" name="textboxB' . $v . '" id="textboxB' . $v . '" placeholder="enlace" value="' . $links["" . $i . ""][1] . '"></div>';
            $v++;
        }
    }

    public static function getDatosDestacados() {
        require_once ('models/Contenido.php');
        $contenido = new Contenido();
        $contenido->setTipo('dato_millones');
        $dato_millones = $contenido->getContenidoByTipo();

        $contenido = new Contenido();
        $contenido->setTipo('dato_iniciativas');
        $dato_iniciativas = $contenido->getContenidoByTipo();

        $contenido = new Contenido();
        $contenido->setTipo('dato_beneficiados');
        $dato_beneficiados = $contenido->getContenidoByTipo();
        $datos = array($dato_millones, $dato_iniciativas, $dato_beneficiados);
        return $datos;
    }

    public static function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LdDIbAZAAAAAJD0-7Nk8sqYxo1_UVAfPyZJ01La',
            'response' => $user_response
        );
        foreach ($fields as $key => $value)
            $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    public static function enviarCorreoFaltante($nombre_corfo, $correo_corfo, $pass_corfo, $correo_destino, $nombre_proyecto, $codigo_proyecto) {
        $resultado = false;
        if ($nombre_corfo && $correo_corfo && $pass_corfo && $correo_destino && $nombre_proyecto && $codigo_proyecto) {
            require 'helpers/correos/recordatorioCorfo.php';
            require 'helpers/correos/firmaCorfo.php';
            date_default_timezone_set('America/Santiago');
            require_once 'PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->setLanguage('es');
            $mail->CharSet = 'utf-8';
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = TRUE; // enable SMTP authentication
            $mail->SMTPSecure = "tls"; //Secure conection
            $mail->Host = 'smtp.office365.com';
            $mail->Port = 587; //587 es el puerto predeterminado para seguridad TLS.
            $mail->Username = $correo_corfo; // Correo GMAIL.
            $mail->Password = $pass_corfo; // Clave de gmail or App Specific Password.
            $mail->IsHTML(true); //El contenido usa Tags HTML?
            $mail->setFrom($correo_corfo, $nombre_corfo . ' - Corfo'); // Set the sender of the message.
            $mail->addAddress($correo_destino, 'Atención! Beneficiario de innovachile Corfo'); // Set the recipient of the message.
            $mail->Body = $correo_mensaje . $firma;
            $mail->Subject = 'Atención! Beneficiario de innovachile Corfo'; // The subject of the message.
            if ($mail->send()) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        } else {
            $resultado = false;
        }
        return $resultado;
    }

    public static function enviarCorreoFaltanteAlwaysTrue($nombre_corfo, $correo_corfo, $pass_corfo, $correo_destino, $nombre_proyecto, $codigo_proyecto) {
        $resultado = true;
        if ($nombre_corfo && $correo_corfo && $pass_corfo && $correo_destino && $nombre_proyecto && $codigo_proyecto) {
            require 'helpers/correos/recordatorioCorfo.php';
            require 'helpers/correos/firmaCorfo.php';
            date_default_timezone_set('America/Santiago');
            require_once 'PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->setLanguage('es');
            $mail->CharSet = 'utf-8';
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->SMTPAuth = TRUE; // enable SMTP authentication
            $mail->SMTPSecure = "tls"; //Secure conection
            $mail->Host = 'smtp.office365.com';
            $mail->Port = 587; //587 es el puerto predeterminado para seguridad TLS.
            $mail->Username = $correo_corfo; // Correo GMAIL.
            $mail->Password = $pass_corfo; // Clave de gmail or App Specific Password.
            $mail->IsHTML(true); //El contenido usa Tags HTML?
            $mail->setFrom($correo_corfo, $nombre_corfo . ' - Corfo'); // Set the sender of the message.
            $mail->addAddress($correo_destino, 'Atención! Beneficiario de innovachile Corfo'); // Set the recipient of the message.
            $mail->Body = $correo_mensaje . $firma;
            $mail->Subject = 'Atención! Beneficiario de innovachile Corfo'; // The subject of the message.
        } else {
            $resultado = true;
        }
        return $resultado;
    }

}
