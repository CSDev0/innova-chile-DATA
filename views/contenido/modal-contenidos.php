<div id="modal-contenido" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url ?>contenido/save" id="formulario-texto" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Seccion</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group" >
                        <div class="col-sm mb-2">
                        <label for="txtNombre">Nombre seccion: </label>
                        <input type="text" class="form-control" name="txtNombre" placeholder="Nombre de la sección..">
                        </div>
                        <div class="col-sm mb-2">
                            <label for="txtTexto">Texto a mostrar:</label>
                            <textarea class='input-contenido-texto' name='txtTexto'></textarea>
                            <h6 id='input-contenido-fecha' class='bg-azul rounded-bottom' name='txtUltimaModificacion'> </h6>
                        </div>
                            <input type="hidden" value="" name="txtTipo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
