<?php $url_action = base_url . "estudio/save"; ?>
<div id="modal-agregar-estudio" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" data-parsley-validate data-parsley-trigger="focusout">
                <div class="modal-header">
                    <h3 class="modal-title thin-font">Agregar un <b>Estudio</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class='col-sm mb-4'>
                            <label for="txtNombre">Nombre<b class="color-rojo">*</b></label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="Estudio de la natalidad" required data-parsley-error-message="Debes ingresar un nombre!">
                        </div>
                        <div class='col-sm mb-4'>
                            <label for="txtDescripcion">Descripción<b class="color-rojo">*</b></label>
                            <textarea class="form-control input-contenido-texto" name="txtDescripcion" required data-parsley-error-message="Debes ingresar una descripción!">Ingrese una descripción..</textarea>
                        </div>
                        <div class='col-sm mb-4'>
                            <label for="cbAno">Año del estudio<b class="color-rojo">*</b></label>
                            <?php
                            $seleccionado = date("Y");
                            $antiguedad = 1900;

                            print '<select class="form-control" name="slcAno" required="true">';
                            foreach (range(date('Y'), $antiguedad) as $x) {
                                print '<option value="' . $x . '"' . ($x === $seleccionado ? ' selected="selected"' : '') . '>' . $x . '</option>';
                            }
                            print '</select>';
                            ?>
                        </div>
                        <input type="hidden" value="estudio" name="tipo">
                        <div class='col-sm mb-4'>
                            <label for="cbAno">Archivo<b class="color-rojo">*</b></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="fileArchivo" id='fileArchivo' required data-parsley-error-message="Debes subir un archivo del estudio!">
                                <label class="custom-file-label" for="archivo">
                                    <span class="d-inline-block text-truncate w-75">Elegir un archivo..</span>
                                </label>
                            </div>
                        </div>
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
