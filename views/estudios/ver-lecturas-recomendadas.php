<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Año</th>
            <th scope="col">Enlace</th>
            <th scope="col">Ultima edición</th>
            <th scope="col">Gestión</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($est2 = $estudios2->fetch_object()):
            if ($est2->tipo == "lectura") {
                ?>
                <tr>
                    <th scope="row"><?=$est2->id?></th>
                    <td><a class="link-normal" href="<?= base_url ?>estudio/view&id=<?= $est2->id ?>"><?=utils::acortador($est2->nombre, 70)?></a></td>
                    <td><?=$est2->ano_estudio?></td>
                    <td><?=utils::acortador($est2->enlace, 30)?></td>
                    <td><?=$est2->fecha_creacion?></td>
                    <td>
                        <a href="<?= base_url ?>estudio/modificarEstudio&id=<?= $est2->id ?>" class="btn btn-success" style="width: 100%;" ><i class="fas fa-edit"></i> Editar</a>
                        <a href="#modal-eliminar" data-toggle="modal" data-ruta="estudio/delete&id=" data-tipo="lectura" data-id="<?= $est2->id ?>" class="btn btn-danger eliminar" 
                           style="margin-top: 5px;width: 100%;" ><i class="fas fa-trash-alt"></i> Eliminar</a>
                    </td>

                </tr>
                <?php
            }
        endwhile;
        ?>
    </tbody>
</table>
