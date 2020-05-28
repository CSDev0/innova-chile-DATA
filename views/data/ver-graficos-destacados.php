<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Enlace</th>
            <th scope="col">Gestión</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Ejemplo</td>
            <td>Ejemplo</td>
            <td>
                <a href="<?= base_url ?>estudio/modificarEstudio&id=<?=""?>" class="btn btn-success" style="width: 100%;" >
                    <i class="fas fa-edit"></i> Editar</a>

                <a href="#modal-eliminar" data-toggle="modal" data-ruta="estudio/delete&id=" data-tipo="estudio" data-id="<?= ""?>" class="btn btn-danger eliminar" 
                   style="margin-top: 5px;width: 100%;" ><i class="fas fa-trash-alt"></i> Eliminar</a>
            </td>

        </tr>
    </tbody>
</table>
