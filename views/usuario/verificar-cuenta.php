<div class='container'>
    <div class="col-sm-10 mi-perfil">
        <h2 class="mt-3">Verificar tu cuenta</h2>
        <hr>
        <form action="<?= base_url . 'usuario/TokenVerificarCuenta' ?>" method="POST">
            <div class="form-group">
                <div class='col-sm mb-2 p-0'>
                    <label for="txtNombre">Codigo de activación: </label>
                    <input type="text" class="form-control" name="txtToken" placeholder="Codigo enviado a tu correo electronico.." required="true">
                </div>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Verificar mi cuenta</button>
            <a href="<?=base_url?>/usuario/logout" class="btn btn-danger"><i class="fas fa-power-off"></i> Cerrar sesión</a>
        </form>
    </div>
</div>

