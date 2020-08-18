<?php $url_action = base_url . "usuario/update"; ?>
<div id="modal-modificar-usuario" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= $url_action ?>" id="formulario-modificar-usuario" method="post" enctype="multipart/form-data" data-parsley-validate data-parsley-trigger="focusout"  >
                <div class="modal-header">
                    <h4 class="modal-title thin-font">Modificar un <b>Usuario</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="txtId" required="true">
                        <div class="col-12 mb-4">
                            <label for="txtRUT">RUT: </label>
                            <input type="text" class="form-control" name="txtRut" placeholder="12565867-5" required minlength="9" data-parsley-error-message="Debe ingresar un rut valido!">
                        </div>
                        <div class="col-12 mb-4">
                            <label for="txtNombre">Nombre: </label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="Ingrese el nombre del usuari@" required data-parsley-error-message="Debe ingresar un nombre!">
                        </div>
                        <div class="col-12 mb-4">
                            <label for="txtApellido">Apellido: </label>
                            <input type="text" class="form-control" name="txtApellido" placeholder="Ingrese el apellido del usuari@" required data-parsley-error-message="Debe ingresar un apellido!">
                        </div>
                        <div class="col-12 mb-4">
                            <label for="txtCorreo">Correo: </label>
                            <input type="text" class="form-control" name="txtCorreo" placeholder="Ingrese el correo del usuari@" required data-parsley-error-message="Debe ingresar un correo valido!">
                        </div>
                        <div class="col-12 mb-4">
                            <div class="form-group">
                                <label for="slcGenero">Genero: </label>
                                <select class="form-control" id="Genero" name=slcGenero>
                                    <option value="1"> Femenino</option>
                                    <option value="2"> Masculino</option>
                                    <option value="3" > Sin especificar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="form-group">
                                <label for="slcActivado">Estado: </label>
                                <select class="form-control" id="Estado" name=slcActivado required>
                                    <option value="1" >Habilitado</option>
                                    <option value="0" >Deshabilitado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fal fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fal fa-save"></i> Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
