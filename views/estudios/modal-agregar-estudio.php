<?php $url_action = base_url . "estudio/save"; ?>
<div id="modal-agregar-estudio" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <h4 class="modal-title">Agregar un estudio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtNombre">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" placeholder="Estudio de la natalidad" required="true">
                        <br>
                        <label for="txtDescripcion">Descripcion: </label>
                        <textarea class="form-control" id='input-estudio-texto'name="txtDescripcion">Ingrese una descripción..</textarea>
                        <br>
                        <label for="cbAno">Año del estudio:</label>
                        <?php
                        $seleccionado = 2010;
                        $antiguedad = 1900;

                        print '<select class="form-control" name="cbAno" required="true">';
                        foreach (range(date('Y'), $antiguedad) as $x) {
                            print '<option value="' . $x . '"' . ($x === $seleccionado ? ' selected="selected"' : '') . '>' . $x . '</option>';
                        }
                        print '</select>';
                        ?>
                        <br>
                        <label for="">Tipo: Estudio</label>
                        <input type="hidden" value="estudio" name="tipo">

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fileArchivo" id='fileArchivo' required="true">
                            <label class="custom-file-label" for="archivo">
                                <span class="d-inline-block text-truncate w-75">Elegir un archivo..</span>
                            </label>

                        </div>
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
