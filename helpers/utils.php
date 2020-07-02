<?php

class utils {

    public static function isActived() {
        if ($_SESSION['identidad']->ACTIVADO == 1) {
            return true;
        } else {
            $_SESSION['aut_msg'] = 'f_habilitada';
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
      $info=$web->getOne();
      $titulo=$info->nombre_web;
      echo $titulo;
    }

    public static function getOtros() {
      require_once ('models/Web.php');
      $web = new Web();
      $web->setId(1);
      $info=$web->getOne();
      $otros=json_decode($info->pie_pagina, true);
      if ($otros != null) {
      }else {
        $otros = json_decode('{"0":["null","null"]}', true);
      }
      for ($i=0; $i < count($otros) ; $i++) {
        echo '<i class="fa fa-angle-double-right" style="color: #0062AB"></i><a class="link-normal" href="'.$otros["".$i.""][1].'">'.$otros["".$i.""][0].'</a><br>';
      }
    }
    public static function getLinks() {
      require_once ('models/Web.php');
      $web = new Web();
      $web->setId(1);
      $info=$web->getOne();
      echo '<a href="'.$info->fb_link.'"><i class="fab fa-facebook-square fa-4x color-azul mr-2"></i></a><a href="'.$info->ig_link.'"><i class="fab fa-instagram-square fa-4x color-ig mr-2"></i></a><a href="'.$info->twt_link.'"><i class="fab fa-twitter-square fa-4x color-azul-claro mr-2"></i></a>';
    }
    public static function getLinksB() {
      require_once ('models/Web.php');
      $web = new Web();
      $web->setId(1);
      $info=$web->getOne();
      return $info;
    }
    public static function getTitulos() {
      require_once ('models/Web.php');
      $web = new Web();
      $web->setId(1);
      $info=$web->getOne();
      $otros=json_decode($info->pie_pagina, true);
      if ($otros != null) {
      }else {
        $otros = json_decode('{"0":["null","null"]}', true);
      }
      $v=1;
      echo '<input type="hidden" id="counter" value="'.count($otros).'">';
      for ($i=0; $i < count($otros) ; $i++) {
        echo '<div id="TextBoxDivA'.$v.'"><input type="text" class="form-control" name="textboxA'.$v.'" id="textboxA'.$v.'" placeholder="titulo" value="'.$otros["".$i.""][0].'"><hr class="bc-celeste"></div>';
        $v++;
      }
    }
    public static function getEnlace() {
      require_once ('models/Web.php');
      $web = new Web();
      $web->setId(1);
      $info=$web->getOne();
      $links=json_decode($info->pie_pagina, true);
      if ($links != null) {
      }else {
        $links =json_decode('{"0":["null","null"]}', true);
      }
      $v=1;
      for ($i=0; $i < count($links) ; $i++) {
        echo '<div id="TextBoxDivB'.$v.'"><input type="text" class="form-control" name="textboxB'.$v.'" id="textboxB'.$v.'" placeholder="enlace" value="'.$links["".$i.""][1].'"><hr class="bc-celeste"></div>';
        $v++;
      }
    }

    public static function getNombres() {
      require_once ('models/Dato_destacado.php');
      $dato = new Dato_destacado();
      $dato->setId(1);
      $datos=$dato->getOne();
      $ldatos=json_decode($datos->datos, true);
      if ($ldatos != null) {
      }else {
        $ldatos = json_decode('{"0":["null","null"]}', true);
      }
      $v=1;

      for ($i=0; $i < count($ldatos) ; $i++) {
        echo '<div id="TextBoxDivA'.$v.'"><input type="text" class="form-control" name="textboxA'.$v.'" id="textboxA'.$v.'" placeholder="titulo" value="'.$ldatos["".$i.""][0].'"><hr class="bc-celeste"></div>';
        $v++;
      }
    }

     public static function getValores() {
      require_once ('models/Dato_destacado.php');
      $dato = new Dato_destacado();
      $dato->setId(1);
      $datos=$dato->getOne();
      $ldatos=json_decode($datos->datos, true);
      if ($ldatos != null) {
      }else {
        $ldatos = json_decode('{"0":["null","null"]}', true);
      }
      $v=1;
      echo '<input type="hidden" id="counter" value="'.count($ldatos).'">';
      for ($i=0; $i < count($ldatos) ; $i++) {
        echo '<div id="TextBoxDivB'.$v.'"><input type="text" class="form-control" name="textboxB'.$v.'" id="textboxB'.$v.'" placeholder="titulo" value="'.$ldatos["".$i.""][1].'"><hr class="bc-celeste"></div>';
        $v++;
      }
    }

    public static function getDatos_destacados() {
      require_once ('models/Dato_destacado.php');
      $dato = new Dato_destacado();
      $dato->setId(1);
      $datos=$dato->getOne();
      $ldatos=json_decode($datos->datos, true);
      if ($ldatos != null) {
      }else {
        $ldatos = json_decode('{"0":["null","null"]}', true);
      }

      for ($i=0; $i < count($ldatos) ; $i++) {
        echo '<div class="col-sm-4"> <h2 class="destacado-naranja "><i class="fas fa-chart-line fa-2x"></i></h2> <h2 class="destacado-naranja">+ $<span class="count">'.$ldatos["".$i.""][1].'</span> <br>'.$ldatos["".$i.""][0].'</h2> </div>';
      }
    }

}
