
<a href="#" class="scrollToTop"><i class="fad fa-arrow-to-top fa-2x"></i></a>
<div class="col-12 page-content p-5" id="content">
    <button id="sidebarCollapse" type="button" class="btn px-4 mb-4 navbar-toggler2 collapsed shadow-sm">
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>
    </button>
    <div class="pr-2">
        <h2 class='mt-2 thin-font'> Gestionar <b>Sitio Web</b></h2>
        <hr>
        <div class="row">
            <div class="col-12 contenedor-gestion">
                <form action="<?= base_url . 'web/update'; ?>" method="post" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-sm-6">
                            <?php require_once('general.php') ?>
                        </div>
                        <div class="col-sm-6">
                            <?php require_once('pie-pagina.php') ?>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <a href="<?= base_url . 'gestion/web' ?>" type="button" class="btn btn-danger mr-2" ><i class="fal fa-times"></i> Cancelar</a>
                        <button type="submit" class="btn btn-success mr-3" id="saveBtnPie"><i class="fal fa-save"></i> Guardar cambios</button>
                    </div>
                </form>
            </div>
            <div class="col-12 contenedor-gestion">
                <div id="loading-div" class='loading-div'></div>
                <h3>Preguntas frecuentes</h3>
                <button class="btn btn-primary btn-abrir-modal-web" href="#modal-agregar-pregunta" data-toggle="modal" data-tipo="">
                    <i class="fal fa-plus"></i> Agregar</button>
                <button class="btn btn-primary" id="btn_todas_preguntas"><i class="fal fa-eye"></i> Ver todos</button>

                <form class="ajaxform mt-4" data-parsley-validate data-parsley-trigger="focusout" >
                    <script>$('.ajaxform').submit(false);</script>
                    <div class="input-group mb-2 pr-1">
                        <input type="text" name="txtBuscarPreguntas" id="txtBuscarPreguntas" placeholder="Buscar por pregunta..." class="form-control mr-1" required minlength="3" data-parsley-error-message="La busqueda debe contener al menos 3 caracteres!" data-parsley-errors-container="#errorContainer" />
                        <div class="input-group-addon">
                            <button class="btn btn-primary form-control ml-1" id="btn_buscar_preguntas"><i class="fal fa-search-plus"></i> Buscar</button>
                        </div>
                    </div>
                    <div id="errorContainer"></div>
                </form>
                <div id="lista_preguntas">
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
                        cargarPreguntas();

                        //                Cargar usuarios por una busqueda o si no existe la busqueda, cargar todos los usuarios.
                        function cargarPreguntas(query)
                        {
                            $.ajax({
                                url: "../ajax/buscar_preguntas_frecuentes.php",
                                method: "post",
                                data: {query: query},
                                success: function (data)
                                {
                                    $('#lista_preguntas').html(data);
                                },
                                error: function () {
                                    $('#lista_preguntas').html('Error en la conexion.')
                                }
                            });
                        }
                        //                Al clickear el boton de buscar, llama a funcion AJAX.

                        $('#btn_buscar_preguntas').click($.debounce(400, function () {
                            var txtBuscarPreguntas = $("#txtBuscarPreguntas").val();
                            //                    Si el campo de la busqueda no esta vacio.
                            if (txtBuscarPreguntas != '') {
                                // Si el campo de la busqueda tiene al menos 3 caracteres.
                                if (txtBuscarPreguntas.length >= 3) {
                                    cargarPreguntas(txtBuscarPreguntas);
                                } else {
                                }
                            } else {

                            }
                        }));
                        $('#btn_todas_preguntas').click($.debounce(400, function () {
                            $('#txtBuscarPreguntas').val('');
                            $('#txtBuscarPreguntas').parsley().reset();
                            cargarPreguntas();
                        }));
                    });

                </script>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
</div>
