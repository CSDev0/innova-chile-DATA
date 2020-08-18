<div id="modal-ver-actividad" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url ?>contenido/save" id="formulario-actividad" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title thin-font">Ver detalle de <b>Actividad</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group" >
                        <div class="col-12 mb-4">
                            <h5 name="titulo-actividad"></h5>
                        </div>
                        <div class="col-12 mb-4" id="conten-texto-antiguo">
                            <label for="txtTexto">Texto antiguo:</label>
                            <textarea class='input-contenido-texto' name='txt_antiguo'></textarea>
                        </div>
                        <div class="col-12 mb-4" id="conten-texto-nuevo">
                            <label for="txtTexto">Texto nuevo:</label>
                            <textarea class='input-contenido-texto' name='txt_nuevo'></textarea>
                        </div>
                    </div>
                </div>
                <h6 id='input-contenido-fecha' class='bg-ultima-modificacion text-center mb-0' name='txtUltimaModificacion'> </h6>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fal fa-times"></i> Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
