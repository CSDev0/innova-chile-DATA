<?php $url_action = base_url . "convocatoria/saveConvocatoria"; ?>
<div id="modal-agregar-convocatoria" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=$url_action?>" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <h4 class="modal-title">Agregar una Convocatoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm mb-2">
                                <?php
                                if($files){
                                    echo '<label for="slcArchivo">Seleccione el archivo del grafico: </label>';
                                    echo '<select class="form-control" id="Archivo" name=slcArchivo onfocus="this.size = 5;" onblur="this.size = 1;" onchange="this.size = 1; this.blur();">';
                                foreach ($files as $file1) {
                                    $info1 = pathinfo($file1);
                                    $name = $info1['filename']; //index
                                    ?>
                                <option value="<?=$file1?>"><?= $name . '.html' ?></option>
                                    <?php
                                }
                                echo '</select>';
                                }else{
                                    echo '<label for="slcArchivo">No hay archivos compatibles en el repositorio o no se ha descargado uno. </label>';
                                }
                                ?>
                        </div>
                        <div class='col-sm mb-2'>
                            <label for="cbAno">Año de la Convocatoria:</label>
                            <?php
                            $seleccionado = date("Y");
                            $antiguedad = 2010;

                            print '<select class="form-control" name="slcAno" required="true">';
                            foreach (range(date('Y'), $antiguedad) as $x) {
                                print '<option value="' . $x . '"' . ($x === $seleccionado ? ' selected="selected"' : '') . '>' . $x . '</option>';
                            }
                            print '</select>';
                            ?>
                        </div>
                        <div class='col-sm mb-2'>
                            <label for="slcLlamado">Nombre: </label>
                            <input type="number" value="0" name="slcLlamado"  class="form-control"/>
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
