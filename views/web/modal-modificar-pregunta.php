<?php $url_action = base_url . "contenido/updatePregunta"?>
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
                        <label for="txtNombre">Pregunta: </label>
                        <input type="text" class="form-control" name="txtNombre" placeholder="¿Que pregunta agregaras?" required="true">
                        <br>
                        <label for="txtTexto">Respuesta: </label>
                        <textarea class="form-control input-contenido-texto" name="txtTexto">Ingrese una respuesta..</textarea>
                        <h6 id='input-contenido-fecha' class='bg-azul rounded-bottom' name='txtUltimaModificacion'> </h6>
                        <br>
                        <label for="">Tipo: Pregunta</label>
                        <input type="hidden" value="pregunta" name="txtTipo">
                        <input type="hidden" value="" name="txtId">
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


