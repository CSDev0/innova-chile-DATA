<?php $url_action = base_url . "estudio/save"; ?>
<div id="modal-agregar-programa" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" data-parsley-validate data-parsley-trigger="focusout" >
                <div class="modal-header">
                    <h3 class="modal-title thin-font">Agregar un <b>Programa</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class='col-sm mb-4'>
                            <label for="txtNombre">Nombre<b class="color-rojo">*</b></label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="Ej: Programa de capacitación.." required data-parsley-error-message="Debes ingresar un nombre!">
                        </div>
                        <div class='col-sm mb-4'>
                            <label for="txtDescripcion">Descripción<b class="color-rojo">*</b></label>
                            <textarea class="form-control input-estudio-texto" name="txtDescripcion" required data-parsley-error-message="Debes ingresar una descripción!">Ingrese una descripción..</textarea>
                        </div>
                        <div class='col-sm mb-4'>
                            <label for="cbAno">Año del programa<b class="color-rojo">*</b></label>
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
                        <input type="hidden" value="programa" name="tipo">
                        <div class='col-sm mb-4' style="cursor: pointer;">
                            <label for="cbAno" >Archivo<b class="color-rojo">*</b></label>
                            <div class="custom-file" style="cursor: pointer;">
                                <input type="file" class="custom-file-input" name="fileArchivo" id='fileArchivo' required="true" style="cursor: pointer;" required data-parsley-error-message="Debes subir un archivo del programa!">
                                <label class="custom-file-label" for="archivo" style="cursor: pointer;">
                                    <span class="d-inline-block text-truncate w-75" style="cursor: pointer;">Elegir un archivo..</span>
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
