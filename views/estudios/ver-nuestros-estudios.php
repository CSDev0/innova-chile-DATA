<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Año</th>
            <th scope="col">Archivo</th>
            <th scope="col">Ultima edición</th>
            <th scope="col">Gestión</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($est = $estudios->fetch_object()):
            if ($est->tipo == "estudio") {
                ?>

                <tr>

                    <th scope="row"><?= $est->id ?></th>

                    <td><a class="link-normal small" href="<?= base_url ?>estudio/view&id=<?= $est->id ?>"><?= utils::acortador($est->nombre, 70) ?></a></td>
                    <td><?= $est->ano_estudio ?></td>
                    <td><?= utils::acortador($est->archivo, 30) ?></td>
                    <td><?= $est->fecha_creacion ?></td>

                    <td>
                                <a href="<?= base_url ?>estudio/modificarEstudio&id=<?= $est->id ?>" class="btn btn-success" style="width: 100%;" ><i class="fas fa-edit"></i> Editar</a>
                                <a href="<?= base_url ?>estudio/delete&id=<?= $est->id ?>" class="btn btn-danger" style="margin-top: 5px;width: 100%;" ><i class="fas fa-trash-alt"></i> Eliminar</a>
                    </td>


                </tr>

                <?php
            }
        endwhile;
        ?>
    </tbody>
</table>

