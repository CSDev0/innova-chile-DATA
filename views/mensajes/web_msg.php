<?php

function d_web() {
    unset($_SESSION['web_msg']);
}
if (isset($_SESSION['web_msg'])) {

    $msg = $_SESSION['web_msg'];
    if ($msg == 'e_modificar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Web actualizada correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_web();
    }

    if ($msg == 'f_modificar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido actualizar la web.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_web();
    }
}

