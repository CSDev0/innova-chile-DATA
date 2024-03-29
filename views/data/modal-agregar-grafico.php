<?php $url_action = base_url . "data/saveGrafico"; ?>
<div id="modal-agregar-grafico" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <h4 class="modal-title thin-font">Agregar un <b>Gráfico destacado</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm mb-4">
                            <?php
                            if ($files) {
                                echo '<label for="slcArchivo">Seleccione el archivo del gráfico: </label>';
                                echo '<select class="form-control select-form" id="Archivo" name=slcArchivo onfocus="this.size = 5;" onblur="this.size = 1;" onchange="this.size = 1; this.blur();">';
                                foreach ($files as $file1) {
                                    $info1 = pathinfo($file1);
                                    $name = $info1['filename']; //index
                                    ?>
                                    <option value="<?= $file1 ?>"><?= $name . '.html' ?></option>
                                    <?php
                                }
                                echo '</select>';
                            } else {
                                echo '<label for="slcArchivo">No hay archivos compatibles en el repositorio o no se ha descargado uno. </label>';
                            }
                            ?>

                        </div>
                        <input type="hidden" class="form-control"  name=slcSeccion value="0">
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
