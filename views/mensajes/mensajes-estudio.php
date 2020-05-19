<?php

//hola
function borrar_estudio_mensaje() {
    unset($_SESSION['estudio_mensaje']);
}

if (isset($_SESSION['estudio_mensaje'])) {
    $mensaje = $_SESSION['estudio_mensaje'];
    if ($mensaje == 'exito_crear') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!";
            var msg = "Estudio agregado correctamente.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_estudio_mensaje();
    }
    if ($mensaje == 'fallo_crear') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!";
            var msg = "Estudio no se ha podido agregar.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_estudio_mensaje();
    }
    if ($mensaje == 'fallo_tipo_archivo') {
        ?>
        <script type="text/javascript">
            var titulo = "Archivo no admitido!";
            var msg = "Solo PDF, PPT, XLS, DOCX, PPTX, HTML.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_estudio_mensaje();
    }
    if ($mensaje == 'exito_eliminar') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!";
            var msg = "Estudio eliminado correctamente.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_estudio_mensaje();
    }
    if ($mensaje == 'fallo_eliminar') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!";
            var msg = "No se ha podido eliminar el estudio.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_estudio_mensaje();
    }
}
