
<?php
ob_start();
require_once 'helpers/utils.php';
require_once 'models/Faltantes.php';
require_once 'models/Contenido.php';

class developController {

    function recordatorioMasivo() {
        if (utils::isAdminOEmpleado()) {
            require_once 'views/layout/sidebar.php';
            require_once 'views/development/recordatorio_masivo.php';
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

    function pruebaEnvioFormato() {
        if (utils::isAdminOEmpleado()) {
            $codigo = '09PDAC-6912';
            $proyecto = 'Programa Integrado Para El Desarrollo Sustentable Del Cultivo De Corvina (Cilus Gilberti)';
            $correo_mensaje = '<p style="font-size:16px; font-family: Calibri;"><strong><span>Estimado(a) beneficiario de InnovaChile CORFO del proyecto "' . $proyecto . '" (Codigo: ' . $codigo . ' ):</span></strong><br /> <br /> 
    <span>Hemos iniciado la evaluaci&oacute;n de nuestros programas de apoyo y queremos invitarte a ser parte del proceso a trav&eacute;s de una 
    <strong>encuesta online</strong> enviada a cada </span><span>beneficiario de <strong>proyectos actualmente en ejecuci&oacute;n</strong>, 
    la que realizaremos peri&oacute;dicamente.</span><br /> <br /> 
    <span>Esta informaci&oacute;n es clave para mejorar nuestro apoyo en el desarrollo de tu proyecto; pues podemos entregar oportunidades de capacitaci&oacute;n, 
    vinculaci&oacute;n y servicios de apoyo, incrementando las probabilidades de &eacute;xito de tu innovaci&oacute;n.</span></p>
    <p style="font-size:16px; font-family: Calibri;"><span>Tu participaci&oacute;n en este proceso es <strong>imprescindible</strong>, pues es parte del compromiso adquirido al inicio de tu proyecto</span><span>.</span></p>
    <p style="font-size:16px; font-family: Calibri;"><span>&nbsp;</span></p>
    <p style="font-size:16px; font-family: Calibri;"><span>Te invitamos a responder la encuesta en la <a href="https://datainnovacion.cl/charly.io">Plataforma Charly.io<a>, 
    pinchando</span><span>. 
    En donde deber&aacute;s iniciar sesi&oacute;n en caso de tener una cuenta o 
    <strong>registrarte con el correo al cual se envi&oacute; este mensaje</strong>. </span></p>
    <p style="font-size:16px; font-family: Calibri;"><span>&nbsp;</span></p>
    <p style="font-size:16px; font-family: Calibri;"><span>Tendr&aacute;s plazo <strong style="color: red;">hasta el &uacute;ltimo viernes de Agosto</strong>
    para completarla.</span><br /> <br /> <span>En caso de consultas y/o dudas, puede dirigirlas </span>
    <span>al correo electr&oacute;nico </span><span><a href="mailto:datainnovacion@corfo.cl">datainnovacion@corfo.cl<a></span><span></span> <br /> &nbsp;</p>
    <p style="font-size:16px; font-family: Calibri;"><span>Desde ya muchas gracias por participar de esta iniciativa, la cual es clave para continuar apoyando la innovaci&oacute;n en Chile.</span></p></div>';
            $firma = '<table>
                                    <tr>
                                        <td colspan="3" style="border-right: 1px solid gray;"><img alt="CORFO" src="https://www.corfo.cl/sites/Satellite;jsessionid=itTpshRUnnQ1qLYuffevZBoxzFnUTWkqLIS_3MeIvvBr2sl2nZk8!1910858500!-1166551036?blobcol=urldata&blobkey=id&blobtable=MungoBlobs&blobwhere=1475167567836&ssbinary=true" width="200" heigh="50" style="margin-right: 10px;"></td>
                                        <td>
                                            <table style="margin-left: 10px;">
                                                <tbody>
                                                    <tr>
                                                        <td style="font-size: 16px;">
                                                        Brenda Rain Garrido
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 14px; color: gray;">
                                                        Unidad de Inteligencia de Negocios
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 16px; margin-top: 15px;">
                                                        Gerencia de Innovaci&oacute;n
                                                        </td>
                                                    </tr>
                                                        <td style="font-size: 16px;">
                                                           <a href="mailto:brenda.rain@corfo.cl"> brenda.rain@corfo.cl </a>
                                                       </td>
                                                    <tr>
                                                    <tr>
                                                        <td style="font-size: 16px; margin-top: 10px;">
                                                            <a href="http://www.corfo.cl/">www.corfo.cl</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                   </tr>
                               </table>';
            date_default_timezone_set('America/Santiago');
            require_once 'PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->setLanguage('es');
            $mail->CharSet = 'utf-8';
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->SMTPAuth = true; // enable SMTP authentication
            $mail->SMTPSecure = "tls"; //Secure conection
            $mail->Host = 'smtp.office365.com';
            $mail->Port = 587; //587 es el puerto predeterminado para seguridad TLS.
            $mail->Username = 'brenda.rain@corfo.cl'; // Correo
            $mail->Password = 'brenda2020'; // Clave del correo
            $mail->AddReplyTo('datainnovacion@corfo.cl', 'Contactar a DataInnovación');
            $mail->IsHTML(true); //Utiliza el contenido html = true si no false
            $mail->setFrom('brenda.rain@corfo.cl', 'Brenda Rain Garrido - Corfo'); // Quien envia.
            $mail->addAddress('saez_claudio@hotmail.com', 'Atención! Beneficiario de innovachile Corfo'); // Recipiente del mensaje
            $mail->Body = $correo_mensaje . $firma;
            echo $mail->Body;
            die();
            //'.base_url.'assets/img/corfo_mail.png
            $mail->Subject = 'Atención! Beneficiario de innovachile Corfo'; // The subject of the message.
            if ($mail->send()) {
                ?>
                }
                <script>
                    swal({
                        title: "Correo de prueba enviado!",
                        text: "El correo de prueba se ha enviado exitosamente.",
                        icon: "success",
                        buttons: false,
                        timer: 2500,
                    });
                </script>
                <?php
            } else {
                ?>
                }
                <script>
                    swal({
                        title: "Error!",
                        text: "El correo de prueba no se ha podido enviar.",
                        icon: "error",
                        buttons: false,
                        timer: 2500,
                    });
                </script>
                <?php
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

    function setAllFaltantesDefault() {
        if (utils::isAdminOEmpleado()) {
            $faltantes = new Faltantes();
            $resultado = $faltantes->setAllEstadoDefault();
            if ($resultado) {
                echo '<div class="row justify-content-center">';
                require_once 'assets/icon/success-icon.php';
                echo '</div>';
                echo '<div class="row justify-content-center"><h3 class="mt-4">Se han restablecido los estados de todos los faltantes a 0 (es decir correo no enviado).</div>';
                echo '<div class="row justify-content-center mt-4"><a class="btn btn-primary" href="' . base_url . 'develop/recordatorioMasivo"><i class="fal fa-arrow-circle-left"></i> Volver</a></div>';
            } else {
                echo '<div class="row justify-content-center">';
                require_once 'assets/icon/error-icon.php';
                echo '</div>';
                echo '<div class="row justify-content-center"><h3 class="color-rojo mt-4">No ha resultado como esperabamos, quiza no haya funcionado.</div>';
                echo '<div class="row justify-content-center mt-4"><a class="btn btn-primary" href="' . base_url . 'develop/recordatorioMasivo"><i class="fal fa-arrow-circle-left"></i> Volver</a></div>';
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

    function pruebaRecorrer() {
        set_time_limit(1500);
        if (utils::isAdminOEmpleado()) {
            if (isset($_POST)) {
                if (isset($_POST['nombre_corfo']) && isset($_POST['cantidad_correos'])) {
                    $nombre_corfo = $_POST['nombre_corfo'];
                    $cantidad_correos = $_POST['cantidad_correos'];
                    if ($cantidad_correos > 40) {
                        $cantidad_correos = 40;
                    } elseif ($cantidad_correos < 5) {
                        $cantidad_correos = 5;
                    }
                    if ($nombre_corfo == 'BrendaRG10553J') {
                        $nombre_corfo = 'Brenda Rain Garrido';
                        $correo_corfo = 'brenda.rain@corfo.cl';
                        $pass_corfo = 'brenda2020';
                    } elseif ($nombre_corfo == 'MacarenaJF49343R') {
                        $nombre_corfo = 'Macarena Jofré Fuentes';
                        $correo_corfo = 'mjofre@corfo.cl';
                        $pass_corfo = 'Maca2020';
                    } elseif ($nombre_corfo == 'FabiánOV99832A') {
                        $nombre_corfo = 'Fabián Ortega Vega';
                        $correo_corfo = 'fabian.ortega@corfo.cl';
                        $pass_corfo = 'Fabian2020';
                    } else {
                        echo '<div class="row justify-content-center">';
                        require_once 'assets/icon/error-icon.php';
                        echo '</div>';
                        echo '<div class="row justify-content-center"><h2 class="color-rojo mt-4">No se ha encontrado la cuenta para enviar correos.</div>';
                        echo '<div class="row justify-content-center mt-4"><a class="btn btn-primary" href="' . base_url . 'develop/recordatorioMasivo"><i class="fal fa-arrow-circle-left"></i> Volver</a></div>';
                        die();
                    }
                    $readyToUse = true;
                    $usuario_corfo = new Contenido();
                    $usuario_corfo->setTipo($nombre_corfo);
                    $usu_corfo = $usuario_corfo->getContenidoByTipo();
                    if ($usu_corfo) {
                        $savedTime = $usu_corfo->ultima_modificacion;
                        $savedTime = strtotime($savedTime);
                        $now = time();
                        if (round(($now - $savedTime) / 60, 2) >= 10) {
                            $readyToUse = true;
                        } elseif (round(($now - $savedTime) / 60, 2) < 10) {
                            $readyToUse = false;
                        }
                    }
                    if ($readyToUse == true) {
                        $object = new Faltantes();
                        $faltantes = $object->getCorreos($cantidad_correos);
                        $faltantes_to_estado = $object->getCorreos($cantidad_correos);
                        $num_rows = mysqli_num_rows($faltantes);
                        if (mysqli_num_rows($faltantes) > 0) {
                            $output1 = '<script>$(".se-pre-con").hide();
                        $(document).ready(function () {
                            $.scrollify.disable();
                        });
                        </script>';
                            echo $output1;
                            if ($faltantes) {
//                            $now = new DateTime();
//                            $date = $now->format("Y-m-d H:i:s");
//                            $usuario_corfo = new Contenido();
//                            $usuario_corfo->setTipo($nombre_corfo);
//                            $usuario_corfo->setTexto('Sin texto');
//                            $usuario_corfo->setNombre('cuenta corfo');
//                            $usuario_corfo->setUltima_modificacion($date);
//                            $usuario_corfo->setUsuario_id($_SESSION['identidad']->id);
//                            if ($usuario_corfo->getContenidoByTipo()) {
//                                $resultado = $usuario_corfo->update();
//                            } else {
//                                $resultado = $usuario_corfo->save();
//                            }

                                $counter = 0;
                                while ($faltante = $faltantes_to_estado->fetch_object()) {
                                    $faltante_update = new Faltantes();
                                    $faltante_update->setId($faltante->id);
                                    $update = $faltante_update->setEstadoEnviado();
                                }

                                while ($faltante = $faltantes->fetch_object()) {
                                    ob_implicit_flush(true);
                                    if (ob_get_level() == 0)
                                        ob_start();
                                    $id = $faltante->id;
                                    $codigo = $faltante->codigo;
                                    $proyecto = $faltante->proyecto;
                                    $correo = $faltante->correo;
                                    $estado = $faltante->estado;
                                    echo '<script>setTimeout(function(){$(".correo-enviado").show("fade", 1000);}, 2000);</script>';
                                    echo '<script>$(".datos-faltante").show("slide", 1000);</script>';
                                    $counterfull = $counter + 1;
                                    $output = '
                         <div class="loading-on">
                         <h3 id="loading-data" class="mt-2 ml-2 thin-font">Enviando los correos, no cierres la pagina porfavor. <b>' . $counterfull . '/' . $num_rows . '<b></h3>
                        <div class="row border datos-faltante pt-4 pb-4">
                            <span class="col-12 pl-4"><b>Codigo:</b> ' . $codigo . ' | <b>ID: ' . $id . '</b></span>
                            <span class="col-12 pl-4"><b>Proyecto:</b> ' . $proyecto . '</span>
                            <span class="col-12 pl-4"><b>Correo:</b> <b class="color-azul">' . $correo . '</b></span>
                            <span class="col-12 pl-4"><b>Estado: ' . $estado . '</b></span>
                                <span class="col-12  pl-4 bg-ultima-modificacion thin-font">Enviando el siguiente correo en <b class="countdown"></b> segundos</span>
                                 <script>    clearInterval(interval);
                                 var timer2 = "0:16"; var interval = setInterval(function () { var timer = timer2.split(":");
                                                    //by parsing integer, I avoid all extra string processing
                                                    var minutes = parseInt(timer[0], 10);
                                                    var seconds = parseInt(timer[1], 10);
                                                    --seconds;
                                                    minutes = (seconds < 0) ? --minutes : minutes;
                                                    if (seconds < 1)
                                                        clearInterval(interval);
                                                    seconds = (seconds < 0) ? 59 : seconds;
                                                    seconds = (seconds < 10) ? "0" + seconds : seconds;
                                                    //minutes = (minutes < 10) ?  minutes : minutes;
                                                    $(".countdown").html(minutes + ":" + seconds);
                                                    timer2 = minutes + ":" + seconds;
                                                }, 1000);
                                </script>';
                                    ob_end_flush();
                                    if ($counter == 0) {
                                        echo '<script>setTimeout(function(){$(".correo-enviado").show("fade", 1000);}, 1000);</script>';
                                        echo '<script>$(".datos-faltante").show("slide", 1000);</script>';
                                        echo $output;
                                    } else {
                                        sleep(16);
                                        echo $output;
                                    };
                                    if (utils::enviarCorreoFaltanteAlwaysTrue($nombre_corfo, $correo_corfo, $pass_corfo, $correo, $proyecto, $codigo)) {
                                        $output2 = '<h4 class="col-12 pl-4 correo-enviado mt-4">Correo enviado correctamente <i class="fas fa-cog fa-spin"></i></h4>
                            <script>$(".correo-enviado").hide("fade", 500); $(".datos-faltante").hide("slide", 500);</script>
                            </div>
                           </div>';
                                    } else {
                                        $faltante_update = new Faltantes();
                                        $faltante_update->setId($faltante->id);
                                        $update = $faltante_update->setEstadoNoEnviado();
                                        $output2 = '<h4 class="col-12 pl-4 color-rojo correo-enviado mt-4">Error al enviar el correo <i class="fas fa-cog fa-spin"></i></h4>
                            <script>$(".correo-enviado").hide("fade", 500); $(".datos-faltante").hide("slide", 500);</script>
                            </div>
                           </div>';
                                    }
                                    echo $output2;

                                    $counter++;
                                }
                                ob_implicit_flush(true);
                                if (ob_get_level() == 0)
                                    ob_start();
                                ob_end_flush();
                                echo $output;
                                echo $output2;
                                sleep(4);

                                echo '<br><br><br><br><br><br><br>';
                                echo '<script>$(".loading-on").hide("puff", 500); $("#loading-data").hide();</script>';
                                echo '<div class="row justify-content-center">';
                                require_once 'assets/icon/success-icon.php';
                                echo '</div>';
                                echo '<h2 class="text-center">Hemos finalizado el envio de correos.<h2>';
                                echo '<div class="row justify-content-center"><a class="btn btn-primary" href="' . base_url . 'develop/recordatorioMasivo"><i class="fal fa-arrow-circle-left"></i> Volver</a></div>';
                                $resultado = false;
//                                $now = new DateTime();
//                                $date = $now->format("Y-m-d H:i:s");
//                                $usuario_corfo = new Contenido();
//                                $usuario_corfo->setTipo($nombre_corfo);
//                                $usuario_corfo->setTexto('Sin texto');
//                                $usuario_corfo->setNombre('cuenta corfo');
//                                $usuario_corfo->setUltima_modificacion($date);
//                                $usuario_corfo->setUsuario_id($_SESSION['identidad']->id);
//                                if ($usuario_corfo->getContenidoByTipo()) {
//                                    $resultado = $usuario_corfo->update();
//                                } else {
//                                    $resultado = $usuario_corfo->save();
//                                }

                                if ($resultado) {
                                    echo '<div class="row justify-content-center mt-4"><span class="color-azul s-text thin-font"><b>EXITO:</b> Ahora deberas esperar 10 minutos para volver a enviar correos con esta cuenta.</span></div>';
                                } else {
                                    echo '<div class="row justify-content-center mt-4"><span class="color-rojo s-text thin-font"><b>CUIDADO:</b> No se ha podido registrar el tiempo de descanso de 10 min en la base de datos.</span></div>';
                                }
                            }
                        } else {
                            echo '<div class="row justify-content-center">';
                            require_once 'assets/icon/error-icon.php';
                            echo '</div>';
                            echo '<div class="row justify-content-center"><h2 class="color-rojo mt-4">No quedan faltantes a los que enviar correos.</div>';
                            echo '<div class="row justify-content-center mt-4"><a class="btn btn-primary" href="' . base_url . 'develop/recordatorioMasivo"><i class="fal fa-arrow-circle-left"></i> Volver</a></div>';
                        }
                    } else {
                        $pasado = 10 - round(($now - $savedTime) / 60, 2);
                        $segundos = $pasado * 60;
                        echo '<div class="row justify-content-center">';
                        require_once 'assets/icon/error-icon.php';
                        echo '</div>';
                        echo '<div class="row justify-content-center"><h2 class="color-rojo mt-4">Esta cuenta esta protegida, aún quedan <b class="color-azul">' . gmdate("i:s", $segundos) . ' minutos</b> para volver a utilizarla.</div>';
                        echo '<div class="row justify-content-center mt-4"><a class="btn btn-primary" href="' . base_url . 'develop/recordatorioMasivo"><i class="fal fa-arrow-circle-left"></i> Volver</a></div>';
                    }
                } else {
                    header("Location:" . base_url . 'develop/recordatorioMasivo');
                }
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

    function enviarCorreos() {

        set_time_limit(1500);
        if (utils::isAdminOEmpleado()) {
            if (isset($_POST)) {
                if (isset($_POST['nombre_corfo']) && isset($_POST['cantidad_correos'])) {
                    $nombre_corfo = $_POST['nombre_corfo'];
                    $cantidad_correos = $_POST['cantidad_correos'];
                    if ($cantidad_correos > 40) {
                        $cantidad_correos = 40;
                    } elseif ($cantidad_correos < 5) {
                        $cantidad_correos = 5;
                    }
                    if ($nombre_corfo == 'BrendaRG10553J') {
                        $nombre_corfo = 'Brenda Rain Garrido';
                        $correo_corfo = 'brenda.rain@corfo.cl';
                        $pass_corfo = 'brenda2020';
                    } elseif ($nombre_corfo == 'MacarenaJF49343R') {
                        $nombre_corfo = 'Macarena Jofré Fuentes';
                        $correo_corfo = 'mjofre@corfo.cl';
                        $pass_corfo = 'Maca2020';
                    } elseif ($nombre_corfo == 'FabiánOV99832A') {
                        $nombre_corfo = 'Fabián Ortega Vega';
                        $correo_corfo = 'fabian.ortega@corfo.cl';
                        $pass_corfo = 'Fabian2020';
                    } else {
                        echo '<div class="row justify-content-center">';
                        require_once 'assets/icon/error-icon.php';
                        echo '</div>';
                        echo '<div class="row justify-content-center"><h2 class="color-rojo mt-4">No se ha encontrado la cuenta para enviar correos.</div>';
                        echo '<div class="row justify-content-center mt-4"><a class="btn btn-primary" href="' . base_url . 'develop/recordatorioMasivo"><i class="fal fa-arrow-circle-left"></i> Volver</a></div>';
                        die();
                    }
                    $readyToUse = true;
                    $usuario_corfo = new Contenido();
                    $usuario_corfo->setTipo($nombre_corfo);
                    $usu_corfo = $usuario_corfo->getContenidoByTipo();
                    if ($usu_corfo) {
                        $savedTime = $usu_corfo->ultima_modificacion;
                        $savedTime = strtotime($savedTime);
                        $now = time();
                        if (round(($now - $savedTime) / 60, 2) >= 10) {
                            $readyToUse = true;
                        } elseif (round(($now - $savedTime) / 60, 2) < 10) {
                            $readyToUse = false;
                        }
                    }
                    if ($readyToUse == true) {
                        $object = new Faltantes();
                        $faltantes = $object->getCorreos($cantidad_correos);
                        $faltantes_to_estado = $object->getCorreos($cantidad_correos);
                        $num_rows = mysqli_num_rows($faltantes);
                        if (mysqli_num_rows($faltantes) > 0) {
                            $output1 = '<script>$(".se-pre-con").hide();
                        $(document).ready(function () {
                            $.scrollify.disable();
                        });
                        </script>';
                            echo $output1;
                            if ($faltantes) {
                                $now = new DateTime();
                                $date = $now->format("Y-m-d H:i:s");
                                $usuario_corfo = new Contenido();
                                $usuario_corfo->setTipo($nombre_corfo);
                                $usuario_corfo->setTexto('Sin texto');
                                $usuario_corfo->setNombre('cuenta corfo');
                                $usuario_corfo->setUltima_modificacion($date);
                                $usuario_corfo->setUsuario_id($_SESSION['identidad']->id);
                                if ($usuario_corfo->getContenidoByTipo()) {
                                    $resultado = $usuario_corfo->update();
                                } else {
                                    $resultado = $usuario_corfo->save();
                                }

                                $counter = 0;
                                while ($faltante = $faltantes_to_estado->fetch_object()) {
                                    $faltante_update = new Faltantes();
                                    $faltante_update->setId($faltante->id);
                                    $update = $faltante_update->setEstadoEnviado();
                                }

                                while ($faltante = $faltantes->fetch_object()) {
                                    ob_implicit_flush(true);
                                    if (ob_get_level() == 0)
                                        ob_start();
                                    $id = $faltante->id;
                                    $codigo = $faltante->codigo;
                                    $proyecto = $faltante->proyecto;
                                    $correo = $faltante->correo;
                                    $estado = $faltante->estado;
                                    echo '<script>setTimeout(function(){$(".correo-enviado").show("fade", 1000);}, 2000);</script>';
                                    echo '<script>$(".datos-faltante").show("slide", 1000);</script>';
                                    $counterfull = $counter + 1;
                                    $output = '
                         <div class="loading-on">
                         <h3 id="loading-data" class="mt-2 ml-2 thin-font">Enviando los correos, no cierres la pagina porfavor. <b>' . $counterfull . '/' . $num_rows . '<b></h3>
                        <div class="row border datos-faltante pt-4 pb-4">
                            <span class="col-12 pl-4"><b>Codigo:</b> ' . $codigo . ' | <b>ID: ' . $id . '</b></span>
                            <span class="col-12 pl-4"><b>Proyecto:</b> ' . $proyecto . '</span>
                            <span class="col-12 pl-4"><b>Correo:</b> <b class="color-azul">' . $correo . '</b></span>
                            <span class="col-12 pl-4"><b>Estado: ' . $estado . '</b></span>
                                <span class="col-12  pl-4 bg-ultima-modificacion thin-font">Enviando el siguiente correo en <b class="countdown"></b> segundos</span>
                                 <script>    clearInterval(interval);
                                 var timer2 = "0:16"; var interval = setInterval(function () { var timer = timer2.split(":");
                                                    //by parsing integer, I avoid all extra string processing
                                                    var minutes = parseInt(timer[0], 10);
                                                    var seconds = parseInt(timer[1], 10);
                                                    --seconds;
                                                    minutes = (seconds < 0) ? --minutes : minutes;
                                                    if (seconds < 1)
                                                        clearInterval(interval);
                                                    seconds = (seconds < 0) ? 59 : seconds;
                                                    seconds = (seconds < 10) ? "0" + seconds : seconds;
                                                    //minutes = (minutes < 10) ?  minutes : minutes;
                                                    $(".countdown").html(minutes + ":" + seconds);
                                                    timer2 = minutes + ":" + seconds;
                                                }, 1000);
                                </script>';
                                    ob_end_flush();
                                    if ($counter == 0) {
                                        echo '<script>setTimeout(function(){$(".correo-enviado").show("fade", 1000);}, 1000);</script>';
                                        echo '<script>$(".datos-faltante").show("slide", 1000);</script>';
                                        echo $output;
                                    } else {
                                        sleep(16);
                                        echo $output;
                                    };
                                    if (utils::enviarCorreoFaltante($nombre_corfo, $correo_corfo, $pass_corfo, $correo, $proyecto, $codigo)) {
                                        $output2 = '<h4 class="col-12 pl-4 correo-enviado mt-4">Correo enviado correctamente <i class="fas fa-cog fa-spin"></i></h4>
                            <script>$(".correo-enviado").hide("fade", 500); $(".datos-faltante").hide("slide", 500);</script>
                            </div>
                           </div>';
                                    } else {
                                        $faltante_update = new Faltantes();
                                        $faltante_update->setId($faltante->id);
                                        $update = $faltante_update->setEstadoNoEnviado();
                                        $output2 = '<h4 class="col-12 pl-4 color-rojo correo-enviado mt-4">Error al enviar el correo <i class="fas fa-cog fa-spin"></i></h4>
                            <script>$(".correo-enviado").hide("fade", 500); $(".datos-faltante").hide("slide", 500);</script>
                            </div>
                           </div>';
                                    }
                                    echo $output2;
                                    $counter++;
                                }
                                ob_implicit_flush(true);
                                if (ob_get_level() == 0)
                                    ob_start();
                                ob_end_flush();
                                echo $output;
                                echo $output2;
                                sleep(4);

                                echo '<br><br><br><br><br><br><br>';
                                echo '<script>$(".loading-on").hide("puff", 500); $("#loading-data").hide();</script>';
                                echo '<div class="row justify-content-center">';
                                require_once 'assets/icon/success-icon.php';
                                echo '</div>';
                                echo '<h2 class="text-center">Hemos finalizado el envio de correos.<h2>';
                                echo '<div class="row justify-content-center"><a class="btn btn-primary" href="' . base_url . 'develop/recordatorioMasivo"><i class="fal fa-arrow-circle-left"></i> Volver</a></div>';
                                $resultado = false;
                                $now = new DateTime();
                                $date = $now->format("Y-m-d H:i:s");
                                $usuario_corfo = new Contenido();
                                $usuario_corfo->setTipo($nombre_corfo);
                                $usuario_corfo->setTexto('Sin texto');
                                $usuario_corfo->setNombre('cuenta corfo');
                                $usuario_corfo->setUltima_modificacion($date);
                                $usuario_corfo->setUsuario_id($_SESSION['identidad']->id);
                                if ($usuario_corfo->getContenidoByTipo()) {
                                    $resultado = $usuario_corfo->update();
                                } else {
                                    $resultado = $usuario_corfo->save();
                                }
                                if ($resultado) {
                                    echo '<div class="row justify-content-center mt-4"><span class="color-azul s-text thin-font"><b>EXITO:</b> Ahora deberas esperar 10 minutos para volver a enviar correos con esta cuenta.</span></div>';
                                } else {
                                    echo '<div class="row justify-content-center mt-4"><span class="color-rojo s-text thin-font"><b>CUIDADO:</b> No se ha podido registrar el tiempo de descanso de 10 min en la base de datos.</span></div>';
                                }
                            }
                        } else {
                            echo '<div class="row justify-content-center">';
                            require_once 'assets/icon/error-icon.php';
                            echo '</div>';
                            echo '<div class="row justify-content-center"><h2 class="color-rojo mt-4">No quedan faltantes a los que enviar correos.</div>';
                            echo '<div class="row justify-content-center mt-4"><a class="btn btn-primary" href="' . base_url . 'develop/recordatorioMasivo"><i class="fal fa-arrow-circle-left"></i> Volver</a></div>';
                        }
                    } else {
                        $pasado = 10 - round(($now - $savedTime) / 60, 2);
                        $segundos = $pasado * 60;
                        echo '<div class="row justify-content-center">';
                        require_once 'assets/icon/error-icon.php';
                        echo '</div>';
                        echo '<div class="row justify-content-center"><h2 class="color-rojo mt-4">Esta cuenta esta protegida, aún quedan <b class="color-azul">' . gmdate("i:s", $segundos) . ' minutos</b> para volver a utilizarla.</div>';
                        echo '<div class="row justify-content-center mt-4"><a class="btn btn-primary" href="' . base_url . 'develop/recordatorioMasivo"><i class="fal fa-arrow-circle-left"></i> Volver</a></div>';
                    }
                } else {
                    header("Location:" . base_url . 'develop/recordatorioMasivo');
                }
            }
        } else {
            header("Location:" . base_url . 'web/login');
        }
    }

}
