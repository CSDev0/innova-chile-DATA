<?php $url_action = base_url . "usuario/saveUsuario"; ?>
<div id="modal-agregar-usuario" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <h4 class="modal-title">Agregar un Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtRUT">RUT: </label>
                        <input type="text" class="form-control" name="txtRut" placeholder="RUT" required="true">
                        <br>
                        <label for="txtNombre">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" placeholder="Nombre" required="true">
                        <br>
                        <label for="txtApellido">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" placeholder="Apellido" required="true">
                        <br>
                        <label for="txtCorreo">Correo: </label>
                        <input type="text" class="form-control" name="txtCorreoRegistro" placeholder="Correo" required="true">
                        <br>
                        <label for="txtPass">Contraseña: </label>
                        <input type="text" class="form-control" name="txtClaveRegistro" placeholder="Contraseña" required="true">
                        <br>
                        <div class="form-group">
                          <label for="txtEstado">Estado: </label>
                          <select class="form-control" id="Estado" name=slcEstado>
                            <option>Habilitado</option>
                            <option>Deshabilitado</option>
                          </select>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
