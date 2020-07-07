<?php

function d_contenido() {
    unset($_SESSION['cont_msg']);
}

if (isset($_SESSION['cont_msg'])) {
    $msg = $_SESSION['cont_msg'];

    if ($msg == 'e_modificar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Contenido modificado correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_contenido();
    }
    if ($msg == 'f_modificar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido modificar el contenido.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_contenido();
    }
    if ($msg == 'e_agregar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Contenido agregado correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_contenido();
    }
    if ($msg == 'f_agregar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido agregar el contenido.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_contenido();
    }
    if ($msg == 'f_datos') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "Faltan datos a completar.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_contenido();
    }
    if ($msg == 'f_extension') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "Este tipo de archivo no esta permitido, solo PDF, PPTX, XLS, JPEG, JPG, PNG, GIF.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_contenido();
    }
    if ($msg == 'f_archivo_eliminar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido eliminar el archivo.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_contenido();
    }
    if ($msg == 'e_archivo_eliminar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Archivo eliminado correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_contenido();
    }
    if ($msg == 'f_archivo_agregar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido agregar el archivo.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_contenido();
    }
    if ($msg == 'e_archivo_agregar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Archivo agregado correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php

        d_contenido();
    }
}
