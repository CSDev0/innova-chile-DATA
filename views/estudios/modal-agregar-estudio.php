<?php $url_action = base_url . "estudio/save"; ?>
<div id="modal-agregar-estudio" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <h3 class="modal-title">Agregar un estudio</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class='col-sm mb-2'>
                            <label for="txtNombre">Nombre: </label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="Estudio de la natalidad" required="true">
                        </div>
                        <div class='col-sm mb-2'>
                            <label for="txtDescripcion">Descripcion: </label>
                            <textarea class="form-control" id='input-estudio-texto'name="txtDescripcion">Ingrese una descripción..</textarea>
                        </div>
                        <div class='col-sm mb-2'>
                            <label for="cbAno">Año del estudio:</label>
                            <?php
                            $seleccionado = 2010;
                            $antiguedad = 1900;

                            print '<select class="form-control" name="slcAno" required="true">';
                            foreach (range(date('Y'), $antiguedad) as $x) {
                                print '<option value="' . $x . '"' . ($x === $seleccionado ? ' selected="selected"' : '') . '>' . $x . '</option>';
                            }
                            print '</select>';
                            ?>
                        </div>
                        <input type="hidden" value="estudio" name="tipo">
                        <div class='col-sm mb-2'>
                            <label for="cbAno">Archivo:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="fileArchivo" id='fileArchivo' required="true">
                                <label class="custom-file-label" for="archivo">
                                    <span class="d-inline-block text-truncate w-75">Elegir un archivo..</span>
                                </label>
                            </div>
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
