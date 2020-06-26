<div id="modal-agregar-lectura" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" accept=".doc,.docx,.ppt,.pptx,.html,.rtf,.txt,.xls,.xl">
                <div class="modal-header">
                    <h3 class="modal-title">Agregar una lectura recomendada</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtNombre">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" placeholder="Estudio de la natalidad">
                        <br>
                        <label for="txtDescripcion">Descripcion: </label>
                        <textarea class="form-control" name="txtDescripcion">Ingrese una descripción..</textarea>
                        <br>
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
                        <br>
                        <label for="">Tipo: Lectura recomendada</label>
                        <input type="hidden" value="lectura" name="tipo">
                        <br>
                        <label for="txtEnlace">Enlace: </label>
                        <input type="text" class="form-control" name="txtEnlace" placeholder="https://corfo.cl/estudios">
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
