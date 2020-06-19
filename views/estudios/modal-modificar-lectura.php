<?php $url_action2 = base_url . "estudio/save"; ?>
<div id="modal-modificar-lectura" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action2 ?>" id="formulario-modificar-lectura" method="post" >
                <div class="modal-header">
                    <h3 class="modal-title">Modificar una lectura recomendada</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm mb-2">
                            <input type="hidden" name="txtId" required="true">
                            <label for="txtNombre">Nombre: </label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="Estudio de la natalidad">
                        </div>
                        <div class="col-sm mb-2">
                            <label for="txtDescripcion">Descripcion: </label>
                            <textarea class="form-control input-contenido-texto" name="txtDescripcion"></textarea>
                            <h6 class='bg-azul rounded-bottom' name='txtUltimaModificacion'> </h6>
                        </div>
                        <div class="col-sm mb-2">
                            <label for="slcAno">Año de la lectura:</label>
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
                            <label for="txtEnlace">Enlace: </label>
                            <input type="text" class="form-control" name="txtEnlace" placeholder="https://corfo.cl/estudios">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
