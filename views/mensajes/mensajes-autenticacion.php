<?php
//hola
function borrar_autenticacion_mensaje() {
    unset($_SESSION['autenticacion_mensaje']);
}

if (isset($_SESSION['autenticacion_mensaje'])) {
    $mensaje = $_SESSION['autenticacion_mensaje'];
    if (isset($_SESSION['identidad'])) {
        $nombre = $_SESSION['identidad']->nombre;
    }
    if ($mensaje == 'exito login') {
        ?>
        <script type="text/javascript">
            var titulo = "Exito!";
            var msg = "Bienvenido <?= $nombre ?>!";
            mostrarMensaje(msg, titulo);
        </script>
        <?php
        borrar_autenticacion_mensaje();
    }
    if ($mensaje == 'fallo login') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!";
            var msg = "Usuario no encontrado o datos incorrectos.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php
        borrar_autenticacion_mensaje();
    }
    if ($mensaje == 'fallo formulario') {
        ?>
        <script type="text/javascript">
            var titulo = "Error!";
            var msg = "No se han ingresado datos.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php
        borrar_autenticacion_mensaje();
    }
    if ($mensaje == 'exito registro') {
        ?>
        <script type="text/javascript">
            var msg = "Te has registrado exitosamente!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_autenticacion_mensaje();
    }
    if ($mensaje == 'fallo registro') {
        ?>
        <script type="text/javascript">
            var msg = "No se ha podido registrar!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_autenticacion_mensaje();
    }
    if($mensaje == 'fallo correo formato'){
        ?>
        <script type="text/javascript">
            var msg = "El correo ingresado no  es valido!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_autenticacion_mensaje();
    }
    if($mensaje == 'fallo restringido'){
        ?>
        <script type="text/javascript">
            var titulo = "Restringido!"
            var msg = "Solo personal autorizado.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php
        borrar_autenticacion_mensaje();
    }
    if($mensaje == 'sesion no iniciada'){
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "Debes iniciar sesión.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php
        borrar_autenticacion_mensaje();
    }
    if($mensaje == 'exito logout'){
        ?>
        <script type="text/javascript">
            var titulo = "Exito!"
            var msg = "Sesión cerrada, hasta pronto.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php
        borrar_autenticacion_mensaje();
    }
    if($mensaje == 'fallo logout'){
        ?>
        <script type="text/javascript">
            var titulo = "Error!"
            var msg = "No se pudo cerrar la sesión.";
            mostrarMensaje(msg, titulo);
        </script>
        <?php
        borrar_autenticacion_mensaje();
    }
    if($mensaje == 'fallo no activada'){
        ?>
        <script type="text/javascript">
            var msg = "Tu cuenta no esta activada!";
            mostrarMensaje(msg);
        </script>
        <?php
        borrar_autenticacion_mensaje();
    }
    
}
