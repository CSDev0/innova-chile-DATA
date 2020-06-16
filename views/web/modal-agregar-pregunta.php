<?php $url_action = base_url . "contenido/save"; ?>
<div id="modal-agregar-pregunta" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <h3 class="modal-title">Agregar una pregunta</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtNombre">Pregunta: </label>
                        <input type="text" class="form-control" name="txtNombre" placeholder="¿Que pregunta agregaras?" required="true">
                        <br>
                        <label for="txtTexto">Respuesta: </label>
                        <textarea class="form-control input-contenido-texto" name="txtTexto">Ingrese una respuesta..</textarea>
                        <br>
                        <label for="">Tipo: Pregunta</label>
                        <input type="hidden" value="pregunta" name="txtTipo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

