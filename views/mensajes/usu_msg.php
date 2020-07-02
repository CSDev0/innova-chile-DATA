<script>
    var exitoTitle = [
        'Esta todo hecho!',
        'Ha resultado genial!',
        'Todo bien, todo correcto!',
        '¿Mejor? imposible!',
        'Todo listo!',
        'Esta listo para ti!'
    ];
    var falloTitle = [
        'Oops, algo salio mal!',
        'Ay no, esto no deberia pasar!',
        'Lo siento, algo salio mal!',
        '¿Error? si, así es!',
        'Oh no, Algo salio mal!'
    ];
</script>
<?php

function d_usuario() {
    unset($_SESSION['usu_msg']);
}
if (isset($_SESSION['usu_msg'])) {

    $msg = $_SESSION['usu_msg'];
    if ($msg == 'e_agregar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Usuario agregado correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }

    if ($msg == 'f_agregar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido agregar el usuario.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }

    if ($msg == 'f_modificar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido modificar el usuario.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }
    if ($msg == 'e_modificar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Usuario modificado correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }
    if ($msg == 'e_eliminar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Usuario eliminado correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }
    if ($msg == 'f_eliminar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido eliminar el usuario.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }
    if ($msg == 'f_admin') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No puedes eliminar un administrador.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }
    if ($msg == 'e_modificar_perfil') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Tu perfil se ha modificado con exito.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }
    if ($msg == 'f_modificar_perfil') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha logrado modificar tu perfil, intentalo nuevamente.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }
    if ($msg == 'e_activar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Tu cuenta ha sido activada, empieza tu travesia!",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }
    if ($msg == 'f_activar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha logrado activar tu cuenta, intentalo nuevamente.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }
    if ($msg == 'e_enviar_codigo') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Se ha enviado un codigo a tu correo, revisalo!",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }
    if ($msg == 'f_enviar_codigo') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido enviar el codigo a tu correo, intentalo nuevamente.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_usuario();
    }
}