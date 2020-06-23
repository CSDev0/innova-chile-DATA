<div id="modal-ver-actividad" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url ?>contenido/save" id="formulario-actividad" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Ver actividad</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group" >
                        <div class="col-sm mb-2">
                            <h5 name="titulo-actividad"></h5>
                        </div>
                        <div class="col-sm mb-2" id="conten-texto-antiguo">
                            <label for="txtTexto">Texto antiguo:</label>
                            <textarea class='input-contenido-texto' name='txt_antiguo'></textarea>

                        </div>
                        <div class="col-sm mb-2" id="conten-texto-nuevo">
                            <label for="txtTexto">Texto nuevo:</label>
                            <textarea class='input-contenido-texto' name='txt_nuevo'></textarea>
                            
                        </div>
                        <div class='col-sm'>
                            <h6 id='input-contenido-fecha' class='bg-azul rounded-bottom' name='txtUltimaModificacion'> </h6>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
