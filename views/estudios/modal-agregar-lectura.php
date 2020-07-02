<div id="modal-agregar-lectura" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" accept=".doc,.docx,.ppt,.pptx,.html,.rtf,.txt,.xls,.xl">
                <div class="modal-header">
                    <h3 class="modal-title">Agregar una lectura recomendada</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class='col-sm mb-2'>
                            <label for="txtNombre">Nombre: </label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="Estudio de la natalidad">
                        </div>
                        <div class='col-sm mb-2'>
                            <label for="txtDescripcion">Descripcion: </label>
                            <textarea class="form-control input-contenido-texto" name="txtDescripcion">Ingrese una descripción..</textarea>
                        </div>
                        <div class='col-sm mb-2'>
                            <label for="slcAno">Año de la lectura:</label>
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
                        <div class='col-sm mb-2'>
                            <label for="txtEnlace">Enlace: </label>
                            <input type="text" class="form-control" name="txtEnlace" placeholder="https://corfo.cl/estudios">
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
