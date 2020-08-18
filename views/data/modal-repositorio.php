<?php $url_action = base_url . "data/updateRepo"; ?>
<div id="modal-repositorio" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>" id="formulario-repositorio" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <h3 class="modal-title thin-font">Gestión del <b>Repositorio</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm mb-4">
                            <label for="txtUsuario">Usuario de github: </label>
                            <input type="text" class="form-control" name="txtUsuario" placeholder="datainnovacion" required="true">
                        </div>
                        <div class="col-sm mb-4">
                            <label for="txtRepositorio">Nombre del repositorio: </label>
                            <input type="text" class="form-control" name="txtRepositorio" placeholder="repositorio_graficos" required="true">
                        </div>
                    </div>
                </div>
                <h6 id='input-contenido-fecha' class='bg-ultima-modificacion text-center mb-0' name='txtUltimaModificacion'> </h6>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fal fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fal fa-save"></i> Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

