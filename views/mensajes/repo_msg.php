<?php

function d_repositorio() {
    unset($_SESSION['repo_mensaje']);
}

if (isset($_SESSION['repo_mensaje'])) {
    $msg = $_SESSION['repo_mensaje'];
    if ($msg == 'e_unzip') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Repositorio descargado y descomprimido correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_repositorio();
    }

    if ($msg == 'f_unzip') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido descomprimir el repositorio, verifica los datos y su existencia.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_repositorio();
    }
    if ($msg == 'e_modificar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Repositorio modificado correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_repositorio();
    }
    if ($msg == 'f_modificar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido modificar el repositorio.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_repositorio();
    }
}
