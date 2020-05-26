<?php

//hola
function borrar_contenido_mensaje() {
    unset($_SESSION['contenido_mensaje']);
}

if (isset($_SESSION['contenido_mensaje'])) {
    $mensaje = $_SESSION['contenido_mensaje'];
    if ($mensaje == 'exito') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!";
            var msg = "Contenido modificado correctamente.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_contenido_mensaje();
    }
    if ($mensaje == 'fallo') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!";
            var msg = "Contenido no se ha podido modificar.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_contenido_mensaje();
    }
    if ($mensaje == 'fallo_datos') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!";
            var msg = "Faltan campos a completar.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_contenido_mensaje();
    }
}
