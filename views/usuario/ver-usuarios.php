<table class="table table-striped" id="tabla_usuarios">
    <thead>
        <tr>
            <th scope="col">RUT</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">Estado</th>
            <th scope="col">Gestion</th>
        </tr>
    </thead>
    <tbody>
      <?php while ($us=$usuarios->fetch_object()) { ?>
        <tr>
            <th scope="row"><?= $us->rut; ?></th>
            <td><?= $us->nombre;  ?></td>
            <td><?= $us->apellido;  ?></td>
            <td><?= $us->correo; ?></td>
            <td><?php if ($us->activado == '1') {
              echo "Habilitado";
            }else {
              echo "Deshabilitado";
            }  ?></td>
            <td>
                Opciones
            </td>
        </tr>
      <?php } ?>
    </tbody>
</table>
