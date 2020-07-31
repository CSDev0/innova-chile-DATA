<div class="table-responsive">
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Actividad</th>
            <th scope="col">Fecha</th>
            <th scope="col">Gestión</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($log = $logs->fetch_object()):
           $usuario = utils::getUsuarioNombre($log->Usuario_id);
                $fecha=utils::getTiempo($log->fecha);
                ?>

                <tr>
                    <th scope="row"><?=$usuario  ?></th>
                    <td><b><?= $log->tipo ?> </b><br> <span class="d-inline-block text-wrap" style="max-width: 250px; width: auto;"><?= $log->actividad ?></span></td>
                    <td><?= $fecha ?></td>
                    <td><a class='btn btn-info' data-toggle="modal" href="#modal-ver-actividad"
                           usuario="<?= $usuario  ?>" tipo="<?=$log->tipo?>" actividad="<?=$log->actividad?>"
                           fecha="<?=$fecha?>" txt_antiguo="<?=htmlentities($log->txt_antiguo)?>" txt_nuevo="<?= htmlentities($log->txt_nuevo)?>">Ver detalles</a></td>
                </tr>

                <?php
        endwhile;
        ?>
    </tbody>
</table>
</div>
