<div id="modal-contenido" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url ?>contenido/save" id="formulario-texto" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title thin-font">Editar <b>Sección</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group" >
                        <div class="col-sm mb-4">
                            <label for="txtNombre">Nombre de la sección: </label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="Nombre de la sección..">
                        </div>
                        <div class="col-sm mb-4">
                            <label for="txtTexto">Texto a mostrar:</label>
                            <textarea class='input-contenido-texto' name='txtTexto'></textarea>
                        </div>
                        <input type="hidden" value="" name="txtTipo">
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
