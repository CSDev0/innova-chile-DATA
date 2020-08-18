<div id="modal-agregar-lectura" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" accept=".doc,.docx,.ppt,.pptx,.html,.rtf,.txt,.xls,.xl" 
                  data-parsley-validate data-parsley-trigger="focusout">
                <div class="modal-header">
                    <h3 class="modal-title thin-font">Agregar una <b>Lectura recomendada</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class='col-sm mb-4'>
                            <label for="txtNombre">Nombre<b class="color-rojo">*</b></label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="Manual de ejemplo" required data-parsley-error-message="Debes ingresar un nombre!" >
                        </div>
                        <div class='col-sm mb-4'>
                            <label for="txtDescripcion">Descripción<b class="color-rojo">*</b></label>
                            <textarea class="form-control input-contenido-texto" name="txtDescripcion" 
                                      required data-parsley-error-message="Debes ingresar una descripción!">Ingresa una descripción..</textarea>
                        </div>
                        <div class='col-sm mb-4'>
                            <label for="slcAno">Año de la lectura<b class="color-rojo">*</b></label>
                            <?php
                            $seleccionado = 2010;
                            $antiguedad = 1900;

                            print '<select class="form-control" name="slcAno">';
                            foreach (range(date('Y'), $antiguedad) as $x) {
                                print '<option value="' . $x . '"' . ($x === $seleccionado ? ' selected="selected"' : '') . '>' . $x . '</option>';
                            }
                            print '</select>';
                            ?>
                        </div>
                        <input type="hidden" value="lectura" name="tipo">
                        <div class='col-sm mb-4'>
                            <label for="txtEnlace">Enlace<b class="color-rojo">*</b></label>
                            <input type="url" class="form-control" name="txtEnlace" placeholder="https://corfo.cl/estudios" 
                                   required data-parsley-error-message="Debes ingresar un enlace valido!">
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
