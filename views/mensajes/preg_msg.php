<?php

function d_preg() {
    unset($_SESSION['preg_msg']);
}

if (isset($_SESSION['preg_msg'])) {

    $msg = $_SESSION['preg_msg'];
    if ($msg == 'e_agregar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Pregunta frecuente agregada correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_preg();
    }

    if ($msg == 'f_agregar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido agregar la pregunta frecuente.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_preg();
    }
    if ($msg == 'e_modificar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Pregunta frecuente modificada correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_preg();
    }
    if ($msg == 'f_modificar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido modificar la pregunta frecuente.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_preg();
    }
    if ($msg == 'e_eliminar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Pregunta frecuente eliminada correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_preg();
    }
    if ($msg == 'f_eliminar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido eliminar la pregunta frecuente.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_preg();
    }
    
}

