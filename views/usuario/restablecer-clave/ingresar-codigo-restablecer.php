<div class='container'>
    <div class="col-sm-10 mi-perfil">
        <h2 class="mt-3">Restablecer clave</h2>
        <hr>
        <form action="<?= base_url . 'usuario/TokenRestablecerClave' ?>" method="POST">
            <div class="form-group">
                <div class='col-sm mb-2 p-0'>
                    <label for="txtNombre">Codigo para restablecer clave: </label>
                    <input type="text" class="form-control" name="txtToken" placeholder="Codigo enviado a tu correo electronico.." required="true">
                </div>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Enviar codigo </button>
            <a href="<?=base_url?>/web/login" class="btn btn-danger"><i class="fas fa-undo-alt"></i> Volver</a>
        </form>
    </div>
</div>

