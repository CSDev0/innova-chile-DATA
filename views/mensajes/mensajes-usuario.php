<?php

function borrar_usuario_mensaje() {
    unset($_SESSION['usuario_mensaje']);
}

if (isset($_SESSION['usuario_mensaje'])) {
    $mensaje = $_SESSION['usuario_mensaje'];
    if ($mensaje == 'exito crear') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!"
            var msg = "Usuario creado exitosamente.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }

    if ($mensaje == 'fallo crear') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se pudo crear usuario.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }

    if ($mensaje == 'fallo modificar') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se pudo modificar usuario.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }
    if ($mensaje == 'exito modificar') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!"
            var msg = "Usuario modificado exitosamente.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }
    if ($mensaje == 'exito eliminar') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!"
            var msg = "Usuario eliminado exitosamente.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }
    if ($mensaje == 'fallo eliminar') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se pudo eliminar el usuario.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }
    if ($mensaje == 'fallo admin') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se puede eliminar al administrador.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }
    if ($mensaje == 'exito modificar perfil') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!"
            var msg = "Tu perfil ha sido modificado exitosamente.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }
    if ($mensaje == 'fallo modificar perfil') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se ha logrado modificar tu perfil, intentalo de nuevo.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }
    if ($mensaje == 'fallo encontrar') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se logro encontrar el usuario.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }
    if ($mensaje == 'exito activar') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!"
            var msg = "Tu cuenta ha sido activada con exito.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }
    if ($mensaje == 'fallo activar') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se ha logrado activar tu cuenta, intentalo nuevamente.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }
    if ($mensaje == 'exito enviar codigo') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!"
            var msg = "Se ha enviado un codigo a tu correo.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }
    if ($mensaje == 'fallo enviar codigo') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se ha logrado enviar el codigo a tu correo, intentalo nuevamente.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php

        borrar_usuario_mensaje();
    }
}