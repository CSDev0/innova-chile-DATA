<?php
function d_estudio() {
    unset($_SESSION['estu_msg']);
}
if (isset($_SESSION['estu_msg'])) {
    $msg = $_SESSION['estu_msg'];
    if ($msg == 'e_agregar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Estudio agregado correctamente",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_estudio();
    }
    if ($msg == 'f_agregar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido agregar el estudio.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_estudio();
    }
    if ($msg == 'f_tipo_archivo') {
        ?>
        <script>
            swal({
                title: '¿Que subiste? Archivo no admitido!',
                text: "Solo PDF, PPT, XLS, DOCX, PPTX, HTML.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_estudio();
    }
    if ($msg == 'e_eliminar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Estudio eliminado correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_estudio();
    }
    if ($msg == 'f_eliminar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido eliminar el estudio.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_estudio();
    }
    if ($msg == 'e_modificar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "Estudio modificado correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_estudio();
    }
    if ($msg == 'f_modificar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido modificar el estudio.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_estudio();
    }
}
