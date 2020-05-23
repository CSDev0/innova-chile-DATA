<div id="modal-seccionC" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="post" enctype="multipart/form-data" accept=".doc,.docx,.ppt,.pptx,.html,.rtf,.txt,.xls,.xl">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Seccion</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtNombre">Nombre seccion: </label>
                        <input type="text" class="form-control" name="txtNombre" value="<?php echo'Data'; ?>" disabled>
                        <br>
                        <label for="txtContenido">Contenido</label>
                        <input type="textArea" class="form-control" name="txtContenido" value="<?php echo'contenido del texto'; ?>">
                        <br>
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
