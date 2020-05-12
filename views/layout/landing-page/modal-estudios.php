<div class="modal fade" id="modal-estudios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Nombre del estudio</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <p>Esta es la descripción breve del estudio en cuestion. Para descargarlo, presione el siguiente botón.</p>
                            <a href="<?= base_url ?>/uploads/documentos/Prueba_de_descarga.txt" download="Prueba_de_descarga.txt">
                                <button class="btn btn-primary">Descargar</button>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>