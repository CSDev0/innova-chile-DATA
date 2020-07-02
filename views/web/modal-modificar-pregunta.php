<?php $url_action = base_url . "contenido/updatePregunta" ?>
<div id="modal-modificar-pregunta" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>"  id="formulario-modificar-pregunta" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <h3 class="modal-title">Modificar una pregunta</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm mb-2">
                            <label for="txtNombre">Pregunta: </label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="¿Que pregunta agregaras?" required="true">
                        </div>
                        <div class="col-sm mb-2">
                            <label for="txtTexto">Respuesta: </label>
                            <textarea class="form-control input-contenido-texto" name="txtTexto">Ingrese una respuesta..</textarea>
                        </div>
                        <input type="hidden" value="pregunta" name="txtTipo">
                        <input type="hidden" value="" name="txtId">
                    </div>
                </div>
                <h6 id='input-contenido-fecha' class='bg-ultima-modificacion text-center mb-0' name='txtUltimaModificacion'> </h6>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>


