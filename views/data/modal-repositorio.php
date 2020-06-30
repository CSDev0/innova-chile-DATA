<?php $url_action = base_url . "data/updateRepo"; ?>
<div id="modal-repositorio" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>" id="formulario-repositorio" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <h3 class="modal-title">Gestión del repositorio</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm mb-2">
                            <label for="txtUsuario">Usuario de github: </label>
                            <input type="text" class="form-control" name="txtUsuario" placeholder="datainnovacion" required="true">
                        </div>
                        <div class="col-sm mb-2">
                            <label for="txtRepositorio">Nombre del repositorio: </label>
                            <input type="text" class="form-control" name="txtRepositorio" placeholder="repositorio_graficos" required="true">
                            <h6 id='input-contenido-fecha' class='bg-azul rounded-bottom' name='txtUltimaModificacion'> </h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

