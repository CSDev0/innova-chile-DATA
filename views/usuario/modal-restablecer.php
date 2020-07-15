<?php $url_action = base_url . "usuario/solicitarRestablecer"; ?>
<div id="modal-restablecer" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" data-parsley-validate data-parsley-trigger="focusout" >
                <div class="modal-header">
                    <h4 class="modal-title">Restablecer tu clave</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class='col-sm mb-2 p-0'>
                            <label for="txtCorreoRestablecer">Correo: </label>
                            <input type="email" class="form-control" name="txtCorreoRestablecer" placeholder="Ingresa tu correo electronico para restablecer tu clave" required minlength="9" data-parsley-error-message="Debe ingresar un correo valido!">
                        </div>
                    </div>
                </div>
                <div class="col-sm row justify-content-end mb-3 p-0">
                    <div class="g-recaptcha" data-sitekey="6LdDIbAZAAAAAIeRRQXmnNSsS-cWp1sLxzDkUh6W"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Enviar codigo</button>
                </div>
            </form>
        </div>
    </div>
</div>

