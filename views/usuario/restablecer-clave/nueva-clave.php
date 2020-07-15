<div class='container'>
    <div class="col-sm-10 mi-perfil">
        <h2 class="mt-3">Restablecer clave</h2>
        <hr>
        <form action="<?= base_url . 'usuario/guardarClave' ?>" method="POST" data-parsley-validate data-parsley-trigger="focusout">
            <div class="form-group">
                <div class='col-sm mb-2 p-0'>
                    <label for="txtClave">Nueva Clave: </label>
                    <input type="password" name="txtClave" class="form-control" value="" id="txtClaveNueva" required minlength="6" data-parsley-error-message="Minímo 6 carácteres!">
                </div>
                <div class='col-sm mb-2 p-0'>
                    <label for="txtClaveVerificar">Repetir clave: </label>
                    <input type="password" name="txtClaveVerificar" class="form-control" value="" data-parsley-equalto="#txtClaveNueva" minlength="6" required data-parsley-error-message="Claves no coinciden!">
                </div>
                <input type="hidden" name="id_usuario" value="<?= $usu->id ?>">  
            </div>
            <div class='col-sm row'>
            <button type="submit" class="btn btn-success mr-2"><i class="fas fa-check"></i> Guardar clave </button>
        </form>
        <form action="<?= base_url . 'usuario/cancelarRestablecer' ?>" method="POST">
            <input type="hidden" name="id_usuario" value="<?= $usu->id ?>">  
            <button type='submit' class="btn btn-danger"><i class="fas fa-power-off"></i> Cancelar todo</button>
        </form>
</div>
    </div>
</div>

