<?php $url_action2 = base_url . "estudio/save"; ?>
<div id="modal-modificar-lectura" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action2 ?>" id="formulario-modificar-lectura" method="post" data-parsley-validate data-parsley-trigger="focusout">
                <div class="modal-header">
                    <h3 class="modal-title thin-font">Modificar una <b>Lectura recomendada</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm mb-2">
                            <input type="hidden" name="txtId" required="true">
                            <label for="txtNombre">Nombre<b class="color-rojo">*</b></label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="Manual de ejemplo" required data-parsley-error-message="Debes ingresar un nombre!">
                        </div>
                        <div class="col-sm mb-2">
                            <label for="txtDescripcion">Descripción<b class="color-rojo">*</b></label>
                            <textarea class="form-control input-contenido-texto" name="txtDescripcion" required data-parsley-error-message="Debes ingresar una descripción!"></textarea>
                        </div>
                        <div class="col-sm mb-2">
                            <label for="slcAno">Año de la lectura<b class="color-rojo">*</b></label>
                            <?php
                            $antiguedad = 1900;
                            ?> 
                            <select class="form-control" id="slcAno-lectura" name="slcAno">
                                <?php
                                foreach (range(date('Y'), $antiguedad) as $x) {
                                    print '<option value="' . $x . '" >' . $x . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" value="lectura" name="tipo">
                        <div class="col-sm mb-2">
                            <label for="txtEnlace">Enlace<b class="color-rojo">*</b></label>
                            <input type="url" class="form-control" name="txtEnlace" placeholder="https://corfo.cl/estudios"
                                   required data-parsley-error-message="Debes ingresar un enlace valido!">
                        </div>
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
