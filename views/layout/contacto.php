
<div class="conten-general">
    <h1 class="titulo"> Contacto</h1>
    <div class="conten-bg">
        <div class="conten-form">
        <form action="<?= base_url . 'web/contactar' ?>" method="POST">
                <div class="conten-form-input">
                <label for="txtTema" class="label-form left">Tema: </label>
                <input type="text" name="txtTema" class="txtForm" value="" placeholder="Pregunta sobre..." required>
            </div>
            <div class="conten-form-input">
                <label for="txtNombre" class="label-form left">Nombre: </label>
                <input type="text" name="txtNombre" class="txtForm" value="" placeholder="Juan" required>
            </div>
            <div class="conten-form-input">
                <label for="txtApellido" class="label-form left">Apellidos: </label>
                <input type="text" name="txtApellidos" class="txtForm" value="" placeholder="Sepulveda Inostroza" required>
            </div>
            <div class="conten-form-input">
                <label for="txtTelefono" class="label-form left">Telefono: </label>
                <input type="text" name="txtTelefono" class="txtForm" value="" placeholder="56930310997 (no es necesario)">
            </div>
            <div class="conten-form-input">
                <label for="txtCorreoRegistro" class="label-form left">Correo: </label>
                <input type="email" name="txtCorreo" class="txtForm" value="" placeholder="Ingresa tu correo electronico.." required data-parsley-error-message="<p id='error-email-reg'>Ingresé un correo valido!</p>">
            </div>
            <div class="conten-form-input contacto">
                <label for="txtCorreoRegistro" class="label-form left">Comentarios: </label>
                <textarea name="txtComentarios" class="textarea-contacto" value="" placeholder="Ingresa tus comentarios aquí.." required ></textarea>
            </div>
            <div class="conten-input-submit">
                <input type="submit" name="btnRegistro" class="btn-form" value="Enviar">
            </div>
        </form>
        </div>
    </div>
</div>