<?php
function borrar_usuario_mensaje() {
    unset($_SESSION['usuario_mensaje']);
}
if (isset($_SESSION['usuario_mensaje'])) {
    $mensaje = $_SESSION['usuario_mensaje'];
    if ($mensaje == 'exito crear') {
        ?>
        <script type="text/javascript">
            var msg = "Usuario creado exitosamente!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }

    if ($mensaje == 'fallo crear') {
        ?>
        <script type="text/javascript">
            var msg = "No se pudo crear usuario!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }

    if ($mensaje == 'fallo modificar') {
        ?>
        <script type="text/javascript">
            var msg = "No se pudo modificar usuario!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }
    if ($mensaje == 'exito modificar') {
        ?>
        <script type="text/javascript">
            var msg = "Usuario modificado exitosamente!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }
    if ($mensaje == 'exito eliminar') {
        ?>
        <script type="text/javascript">
            var msg = "Usuario eliminado exitosamente!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }
    if ($mensaje == 'fallo eliminar') {
        ?>
        <script type="text/javascript">
            var msg = "No se pudo eliminar usuario!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }
    if ($mensaje == 'exito modificar perfil') {
        ?>
        <script type="text/javascript">
            var msg = "Perfil modificado exitosamente!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }
    if ($mensaje == 'fallo modificar perfil') {
        ?>
        <script type="text/javascript">
            var msg = "No se pudo modificar perfil!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }
    if ($mensaje == 'fallo encontrar') {
        ?>
        <script type="text/javascript">
            var msg = "No se encontro el usuario!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }
    if ($mensaje == 'exito activar') {
        ?>
        <script type="text/javascript">
            var msg = "Cuenta activada con exito!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }
    if ($mensaje == 'fallo activar') {
        ?>
        <script type="text/javascript">
            var msg = "No se ha podido activar cuenta!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }
        if ($mensaje == 'exito enviar codigo') {
        ?>
        <script type="text/javascript">
            var msg = "Se ha enviado un codigo a tu correo!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }
            if ($mensaje == 'fallo enviar codigo') {
        ?>
        <script type="text/javascript">
            var msg = "No se ha podido enviar el codigo a tu correo!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_usuario_mensaje();
    }
}