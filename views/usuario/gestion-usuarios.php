<div class="pr-2">
<h2 class='mt-2'> Gestionar <b>Usuarios</b></h2>
<hr>
<div class="row">
    <div class='col-12'>
    <input data-size="s" type="checkbox" id="estudios-toggle" checked data-toggle="toggle" data-on="Usuarios" data-off="Actividad" data-onstyle="nuestros" data-offstyle="recomendadas">
    </div>
    <div class="col-12 contenedor-estudios" id="contenedor-nuestros-estudios">
        <div id="loading-div" class='loading-div'></div>
        <h3>Usuarios</h3>
        <button class="btn btn-primary" href="#modal-agregar-usuario" data-toggle="modal"><i class="fas fa-plus-square"></i> Agregar</button>
        <button class="btn btn-primary" name="btn_todos_usuarios" id="btn_todos_usuarios"><i class="fas fa-eye"></i> Ver todos</button>
        <hr>
        <form class="ajaxform" data-parsley-validate data-parsley-trigger="focusout" >
            <script>$('.ajaxform').submit(false);</script>
            <div class="input-group mb-0 pr-1">
                <input type="text" name="txtBuscarUsuario" id="txtBuscarUsuario" placeholder="Buscar por RUT, Correo, Nombre o Apellido..." class="form-control mr-1" required minlength="3" data-parsley-error-message="La busqueda debe contener al menos 3 caracteres!" data-parsley-errors-container="#errorContainer" />
                <div class="input-group-addon">
                    <button class="btn btn-primary form-control ml-1" name="btn_buscar_usuarios" id="btn_buscar_usuarios"><i class="fas fa-search-plus"></i> Buscar</button>
                </div>
            </div>
            <div id="errorContainer"></div>
        </form>
        <br>
        <div id="lista_usuarios">
        </div>
        <script>
            $(document).ready(function () {
//              Funcion para mostrar un spinner loading para AJAX.
                $('#loading-div').hide();
                var $loading = $('#loading-div');
                $(document)
                        .ajaxStart(function () {
                            $loading.show();
                        })
                        .ajaxStop(function () {
                            setTimeout(function(){
                                $loading.hide();
                            }, 300);
                            
                        });
//                 Llama a la funcion Cargar los usuarios al cargar la pagina por AJAX.
                cargarUsuarios();

//                Cargar usuarios por una busqueda o si no existe la busqueda, cargar todos los usuarios.
                function cargarUsuarios(query)
                {
                    $.ajax({
                        url: "../ajax/buscar_usuario.php",
                        method: "post",
                        data: {query: query},
                        success: function (data)
                        {
                            $('#lista_usuarios').html(data);
                        },
                        error: function () {
                            $('#lista_usuarios').html('Error en la conexion.')
                        }
                    });
                }
//                Al clickear el boton de buscar, llama a funcion AJAX.

                $('#btn_buscar_usuarios').click($.debounce(400, function () {
                    var txtBuscarUsuario = $("#txtBuscarUsuario").val();
//                    Si el campo de la busqueda no esta vacio.
                    if (txtBuscarUsuario != '') {
                        // Si el campo de la busqueda tiene al menos 3 caracteres.
                        if (txtBuscarUsuario.length >= 3) {
                            cargarUsuarios(txtBuscarUsuario);
                        } else {
                        }
                    } else {

                    }
                }));
                $('#btn_todos_usuarios').click($.debounce(400, function () {
                    $('#txtBuscarUsuario').parsley().reset();
                    cargarUsuarios();
                }));
            });
        </script>
    </div>
</div>
<div class="row pr-4">
    <div class="col-12 contenedor-lecturas " id="contenedor-lecturas-recomendadas">
        <h4>Registro de actividad</h4>
        <?php require_once('views/usuario/ver-actividad.php'); ?>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>
</div>
</div>
</div>