<?php $url_action2 = base_url . "estudio/save"; ?>
<div id="modal-modificar-estudio" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action2 ?>" id="formulario-modificar-estudio" method="post" enctype="multipart/form-data" accept=".doc,.docx,.ppt,.pptx,.html,.rtf,.txt,.xls,.xl" 
                  data-parsley-validate data-parsley-trigger="focusout">
                <div class="modal-header">
                    <h3 class="modal-title thin-font">Modificar un <b>Estudio</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="txtId" required="true">
                        <div class="col-sm mb-4">
                            <label for="txtNombre">Nombre<b class="color-rojo">*</b></label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="Estudio de la natalidad" required data-parsley-error-message="Debes ingresar un nombre!">
                        </div>
                        <div class="col-sm mb-4">
                            <label for="txtDescripcion">Descripcion<b class="color-rojo">*</b></label>
                            <textarea class="form-control input-contenido-texto" name="txtDescripcion" required data-parsley-error-message="Debes ingresar una descripción!"></textarea>
                        </div>
                        <div class="col-sm mb-4">
                            <label for="slcAno">Año del estudio<b class="color-rojo">*</b></label>
                            <?php
                            $antiguedad = 1900;
                            ?> 
                            <select class="form-control" id="slcAno-estudio" name="slcAno">
                                <?php
                                foreach (range(date('Y'), $antiguedad) as $x) {
                                    print '<option value="' . $x . '" >' . $x . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm mb-1">
                            <input type="hidden" value="estudio" name="tipo">
                            <a href="#" target="_blank" name="archivoAntiguo" class="bg-primary rounded-top">Ver Archivo actual</a>
                        </div>
                        <div class="col-sm mb-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="fileArchivo" id='fileArchivo'>
                                <label class="custom-file-label" for="archivo">
                                    <span class="d-inline-block text-truncate w-75" id="nombre-archivo">Elegir un archivo nuevo..</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 id='input-contenido-fecha' class='bg-ultima-modificacion text-center mb-0 m-0' name='txtUltimaModificacion'> </h6>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fal fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fal fa-save"></i> Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
