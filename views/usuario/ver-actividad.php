<div class="table-responsive">
    <table class="table table-striped xs-text">
            <tr>
                <th>Usuario</th>
                <th>Actividad</th>
                <th>Fecha</th>
                <th>Gestión</th>
            </tr>
            <?php
            while ($log = $logs->fetch_object()):
                $usuario = utils::getUsuarioNombre($log->Usuario_id);
                $fecha = utils::getTiempo($log->fecha);
                ?>

                <tr>
                    <td class="color-azul"><?= $usuario ?></td>
                    <td><b><?= $log->tipo ?> </b><br> <span class="d-inline-block text-wrap" style="max-width: 250px; width: auto;"><?= $log->actividad ?></span></td>
                    <td><?= $fecha ?></td>
                    <td><a class='btn btn-info xs-text align-self-center' data-toggle="modal" href="#modal-ver-actividad"
                           usuario="<?= $usuario ?>" tipo="<?= $log->tipo ?>" actividad="<?= $log->actividad ?>"
                           fecha="<?= $fecha ?>" txt_antiguo="<?= htmlentities($log->txt_antiguo) ?>" txt_nuevo="<?= htmlentities($log->txt_nuevo) ?>"><i class="fal fa-info-circle"></i> Ver detalles</a></td>
                </tr>
                <?php
            endwhile;
            ?>
    </table>
</div>
