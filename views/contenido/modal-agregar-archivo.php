<?php $url_action = base_url . "contenido/saveArchivo"; ?>
<div id="modal-agregar-archivo" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <h3 class="modal-title">Agregar un archivo</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                        <div class='col-sm mb-2'>
                            <label for="cbAno">Archivo o Imagen: </label>
                            <label class="xs-text">(JPG, PNG, JPEG, PDF, XLS, PPT)</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="fileArchivo" id='fileArchivo' required="true">
                                <label class="custom-file-label" for="fileArchivo">
                                    <span class="d-inline-block text-truncate w-75">Elegir un archivo..</span>
                                </label>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
