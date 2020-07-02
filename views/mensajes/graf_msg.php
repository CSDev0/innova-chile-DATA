<?php
function d_grafico() {
    unset($_SESSION['graf_msg']);
}
if (isset($_SESSION['graf_msg'])) {
    $msg = $_SESSION['graf_msg'];
    if ($msg == 'e_agregar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "El grafico ha sido agregado correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_grafico();
    }

    if ($msg == 'f_agregar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido agregar el grafico.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_grafico();
    }
    if ($msg == 'e_eliminar') {
        ?>
        <script>
            var randomExito = Math.floor(Math.random() * exitoTitle.length);
            var title = exitoTitle[randomExito];
            swal({
                title: title,
                text: "El grafico ha sido eliminado correctamente.",
                icon: "success",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_grafico();
    }
    if ($msg == 'f_eliminar') {
        ?>
        <script>
            var randomFallo = Math.floor(Math.random() * falloTitle.length);
            var title = falloTitle[randomFallo];
            swal({
                title: title,
                text: "No se ha podido eliminar el grafico.",
                icon: "error",
                buttons: false,
                timer: 2500,
            });
        </script>
        <?php
        d_grafico();
    }
}
