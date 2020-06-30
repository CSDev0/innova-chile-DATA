<?php

function borrar_repo_mensaje() {
    unset($_SESSION['repo_mensaje']);
}

if (isset($_SESSION['repo_mensaje'])) {
    $mensaje = $_SESSION['repo_mensaje'];
    if ($mensaje == 'exito_unzip') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!"
            var msg = "Repositorio descargado y descomprimido.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_repo_mensaje();
    }

    if ($mensaje == 'fallo_unzip') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se pudo descomprimir el repositorio.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_repo_mensaje();
    }
    if ($mensaje == 'exito_modificar') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!"
            var msg = "Repositorio modificado correctamente.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_repo_mensaje();
    }
    if ($mensaje == 'fallo_modificar') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se ha podido modificar repositorio.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_repo_mensaje();
    }
}
