<?php
if ($est->archivo == "" || $est->archivo == null) {
    $nombre_archivo = "no existe.";
} else {
    $nombre_archivo = utils::acortador($est->archivo, 100);
}
?>
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title"><?= $est->nombre ?></h3>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <p><?= $est->descripcion ?></p>
                </div>
                <div class="row">
                    <pre>Archivo: <a class="link-normal small"href='<?=base_url ?>uploads/documentos/estudios/<?= $nombre_archivo ?>'><?= $nombre_archivo ?></a></pre>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <a href="<?= base_url ?>/uploads/documentos/estudios/<?= $est->archivo ?>" download="<?= $est->archivo ?>">
                <button class="btn btn-primary">Descargar</button>
            </a>
            <a target="_blank" href="<?= base_url ?>/uploads/documentos/estudios/<?= $est->archivo ?>">
                <button class="btn btn-primary">Ver en linea</button>
            </a>
            <a href="<?= base_url ?>gestion/estudios" class="btn btn-danger">Volver</a>
        </div>
    </div>
</div>

