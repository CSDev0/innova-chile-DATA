<?php

//hola
function d_autenticacion() {
    unset($_SESSION['aut_msg']);
}

if (isset($_SESSION['aut_msg'])) {
    $msg = $_SESSION['aut_msg'];
    if (isset($_SESSION['identidad'])) {
        $nombre = $_SESSION['identidad']->nombre;
    }
    if ($msg == 'e_login_o') {
        ?>
        <script>
            swal({  
                title: "Has iniciado sesión!",
                text: "Bienvenido <?= $nombre ?>.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_autenticacion();
    }
    if ($msg == 'e_login_a') {
        ?>
        <script>
            swal({  
                title: "Has iniciado sesión!",
                text: "Bienvenida <?= $nombre ?>.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_autenticacion();
    }
    if ($msg == 'e_login_@') {
        ?>
        <script>
            swal({  
                title: "Has iniciado sesión!",
                text: "Bienvenid@ <?= $nombre ?>.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_autenticacion();
    }
    if ($msg == 'f_login') {
        ?>
        <script>
            swal({  
                title: "Oops, Algo salió mal!",
                text: "No se ha encontrado al usuario o has ingresado datos incorrectos.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_autenticacion();
    }
    if ($msg == 'f_formulario') {
        ?>
        <script>
            swal({  
                title: "Oops, Algo salió mal!",
                text: "No has ingresado todos los datos.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_autenticacion();
    }
    if ($msg == 'f_restringido') {
        ?>
        <script>
            swal({  
                title: "Hey! ¿Para donde vas?!",
                text: "No tienes permisos para ir por ahí.",
                icon: "warning",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_autenticacion();
    }
    if ($msg == 'f_no_login') {
        ?>
        <script>
            swal({  
                title: "Hey! ¿Para donde vas?!",
                text: "Necesitas iniciar sesión primero.",
                icon: "warning",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_autenticacion();
    }
    if ($msg == 'e_logout') {
        ?>
        <script>
            swal({  
                title: "Has cerrado tu sesión!",
                text: "Esperamos que vuelvas pronto.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_autenticacion();
    }
    if ($msg == 'f_logout') {
        ?>
        <script>
            swal({  
                title: "Oops, algo salió mal!",
                text: "No se ha podido cerrar tu sesión.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_autenticacion();
    }
    if ($msg == 'f_habilitada') {
        ?>
        <script>
            swal({  
                title: "Tu cuenta no esta habilitada!",
                text: "Contacta con un administrador.",
                icon: "warning",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_autenticacion();
    }
}
