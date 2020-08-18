<a href="#" class="scrollToTop"><i class="fad fa-arrow-to-top fa-2x"></i></a>
<div class="col-12 page-content p-5" id="content">
    <button id="sidebarCollapse" type="button" class="btn px-4 mb-4 navbar-toggler2 collapsed shadow-sm">
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>
    </button>
    <div class="pr-2">
        <h2 class='mt-2 thin-font'> Gestionar <b >Usuarios</b> y <b class="mr-4">Actividad</b> <input class="shadow" data-size="s" type="checkbox" id="contenedor-toggle" checked data-toggle="toggle" data-on="Usuarios" data-off="Actividad" data-onstyle="nuestros" data-offstyle="recomendadas"></h2> 
        <hr>
        <div class="row">
            <div class="col-12 contenedor-gestion contenedor-first">
                <div id="loading-div" class='loading-div'></div>
                <h3>Usuarios</h3>
                <button class="btn btn-primary" href="#modal-agregar-usuario" data-toggle="modal"><i class="fal fa-plus"></i> Agregar</button>
                <button class="btn btn-primary" name="btn_todos_usuarios" id="btn_todos_usuarios"><i class="fal fa-eye"></i> Ver todos</button>

                <form class="ajaxform mt-4" data-parsley-validate data-parsley-trigger="focusout" >
                    <script>$('.ajaxform').submit(false);</script>
                    <div class="input-group mb-0 pr-1">
                        <input type="text" name="txtBuscarUsuario" id="txtBuscarUsuario" placeholder="Buscar por RUT, Correo, Nombre o Apellido..." class="form-control mr-1" required minlength="3" data-parsley-error-message="La busqueda debe contener al menos 3 caracteres!" data-parsley-errors-container="#errorContainer" />
                        <div class="input-group-addon">
                            <button class="btn btn-primary form-control ml-1" name="btn_buscar_usuarios" id="btn_buscar_usuarios"><i class="fal fa-search-plus"></i> Buscar</button>
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
                        $('.se-pre-con').hide('slide', {direction: 'up'}, 300);
                        var $loading = $('.se-pre-con');
                        $(document)
                                .ajaxStart(function () {
                                    $loading.show();
                                })
                                .ajaxStop(function () {
                                    $loading.hide('slide', {direction: 'up'}, 300);
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
                            $('#txtBuscarUsuario').val('');
                            $('#txtBuscarUsuario').parsley().reset();
                            cargarUsuarios();
                        }));
                    });
                </script>
            </div>
        </div>
        <div class="row">
            <div class="col-12 contenedor-gestion contenedor-second">
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
</div>