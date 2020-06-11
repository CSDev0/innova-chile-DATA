<?php $url_action2 = base_url . "estudio/update"; ?>
<div id="modal-modificar-estudio" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= $url_action2 ?>" id="formulario-modificar-estudio" method="post" enctype="multipart/form-data" accept=".doc,.docx,.ppt,.pptx,.html,.rtf,.txt,.xls,.xl" >
                <div class="modal-header">
                    <h3 class="modal-title">Modificar un estudio</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="txtId" required="true">
                        <label for="txtNombre">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" placeholder="Estudio de la natalidad">
                        <br>
                        <label for="txtDescripcion">Descripcion: </label>
                        <textarea class="form-control" name="txtDescripcion"></textarea>
                        <br>
                        <label for="cbAno">Año de la lectura:</label>
                        <?php
                        $antiguedad = 1900;

                        print '<select class="form-control" name="slcAno">';
                        foreach (range(date('Y'), $antiguedad) as $x) {
                            print '<option name="slcAno" value="'.$x .'" selected="selected">' . $x . '</option>';
                        }
                        print '</select>';
                        ?>
                        <br>
                        <label for="">Tipo: Estudio</label>
                        <input type="hidden" value="estudio" name="tipo">
                        <br>
                        <a href="" target="_blank" name="archivoAntiguo">Archivo actual</a>
                        <br>
                        <br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fileArchivo" id='fileArchivo' required="true">
                            <label class="custom-file-label" for="archivo">
                                <span class="d-inline-block text-truncate w-75">Elegir un archivo nuevo..</span>
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
