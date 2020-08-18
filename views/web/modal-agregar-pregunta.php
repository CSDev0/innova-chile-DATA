<?php $url_action = base_url . "contenido/save"; ?>
<div id="modal-agregar-pregunta" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <h3 class="modal-title thin-font">Agregar una <b>Pregunta</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-12 mb-4">
                            <label for="txtNombre">Pregunta: </label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="¿Que pregunta agregaras?" required="true">
                        </div>
                        <div class="col-12 mb-4">
                            <label for="txtTexto">Respuesta: </label>
                            <textarea class="form-control input-contenido-texto" name="txtTexto">Ingrese una respuesta..</textarea>
                        </div>
                        <input type="hidden" value="pregunta" name="txtTipo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fal fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fal fa-check"></i> Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

