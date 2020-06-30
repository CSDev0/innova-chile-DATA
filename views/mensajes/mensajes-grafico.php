<?php

function borrar_grafico_mensaje() {
    unset($_SESSION['grafico_mensaje']);
}

if (isset($_SESSION['grafico_mensaje'])) {
    $mensaje = $_SESSION['grafico_mensaje'];
    if ($mensaje == 'exito_agregar') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!"
            var msg = "Grafico agregado correctamente.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_grafico_mensaje();
    }

    if ($mensaje == 'fallo_agregar') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se pudo agregar el grafico.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_grafico_mensaje();
    }
    if ($mensaje == 'exito_eliminar') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!"
            var msg = "Grafico eliminado correctamente.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_grafico_mensaje();
    }
    if ($mensaje == 'fallo_eliminar') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se ha podido eliminar el grafico.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_grafico_mensaje();
    }
}
