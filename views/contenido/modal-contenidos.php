<div id="modal-contenido" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url ?>contenido/save" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Seccion</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group" >
                        <label for="txtNombre">Nombre seccion: </label>
                        <div id='modal-contenido-nombre'>

                        </div>
                        <br>
                        <div id="modal-contenido-texto">
                        <label for="txtTexto">Texto a mostrar:</label>
                        
                        </div>
                        <br>
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
