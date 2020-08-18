<a href="#" class="scrollToTop"><i class="fad fa-arrow-to-top fa-2x"></i></a>
<div class="col-12 page-content p-5" id="content">
    <button id="sidebarCollapse" type="button" class="btn px-4 mb-4 navbar-toggler2 collapsed shadow-sm">
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>
    </button>
    <div class="pr-2">
        <div class="row">
            <div class="col-12" >
                <h2 class='mt-2 thin-font'> Gestionar <b>Politicas Publicas</b></h2>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-4" >
                <i class="fa fa-map-marker-alt fa-2x" id="nes-marker"></i><button class="btn btn-option mr-1 mt-1" id="btn-nes">Nuestros estudios</button>
            </div>
            <div class="col-4" >
                <i class="fa fa-map-marker-alt fa-2x" id="lec-marker"></i><button class="btn btn-option mr-1 mt-1" id="btn-lec">Lecturas recomendadas</button>
            </div>
            <div class="col-4" >
                <i class="fa fa-map-marker-alt fa-2x" id="pro-marker"></i><button class="btn btn-option mr-1 mt-1" id="btn-pro">Programas</button>
            </div>
        </div>
            <!--<input data-size="s"type="checkbox" id="contenedor-toggle" checked data-toggle="toggle" data-on="Nuestros estudios" data-off="Lecturas recomendadas" data-onstyle="nuestros" data-offstyle="recomendadas"></h2>--> 
        <hr>
        <div class="row">
            <div class="col-12 contenedor-gestion contenedor-first">
                <div id="loading-div" class='loading-div'></div>
                <h3>Nuestros estudios</h3>
                <button class="btn btn-primary" href="#modal-agregar-estudio" data-toggle="modal"><i class="fal fa-plus"></i> Agregar</button>
                <button class="btn btn-primary" name="btn_todos_nuestros_estudios" id="btn_todos_nuestros_estudios"><i class="fal fa-eye"></i> Ver todos</button>

                <form class="ajaxform mt-4" data-parsley-validate data-parsley-trigger="focusout" >
                    <script>$('.ajaxform').submit(false);</script>
                    <div class="input-group pr-1">
                        <input type="text" name="txtBuscarNuestrosEstudios" id="txtBuscarNuestrosEstudios" placeholder="Buscar por Nombre, Año o Archivo..." class="form-control mr-1" required minlength="3" data-parsley-error-message="La busqueda debe contener al menos 3 caracteres!" data-parsley-errors-container="#errorContainer1" />
                        <div class="input-group-addon">
                            <button class="btn btn-primary form-control ml-1" name="btn_buscar_nuestros_estudios" id="btn_buscar_nuestros_estudios"><i class="fal fa-search-plus"></i> Buscar</button>
                        </div>
                    </div>
                    <div class="small-br"></div>
                    <div id="errorContainer1"></div>
                </form>
                <div id="lista_nuestros_estudios">
                </div>
                <script>
                    $(document).ready(function () {
                        //Función para mostrar un spinner loading para AJAX.
                        $('.se-pre-con').hide('slide', {direction: 'up'}, 300);
                        var $loading = $('.se-pre-con');
                        $(document)
                                .ajaxStart(function () {
                                    $loading.show();
                                })
                                .ajaxStop(function () {
                                    $loading.hide('slide', {direction: 'up'}, 300);
                                });
                        //Llama a la funcion Cargar los usuarios al cargar la pagina por AJAX.
                        cargarNuestrosEstudios();

                        //Cargar usuarios por una busqueda o si no existe la busqueda, cargar todos los usuarios.
                        function cargarNuestrosEstudios(query)
                        {
                            $.ajax({
                                url: "../ajax/politicas_publicas/buscar_nuestros_estudios.php",
                                method: "post",
                                data: {query: query},
                                success: function (data)
                                {
                                    $('#lista_nuestros_estudios').html(data);
                                },
                                error: function () {
                                    $('#lista_nuestros_estudios').html('Error en la conexion.')
                                }
                            });
                        }
                        //                Al clickear el boton de buscar, llama a funcion AJAX.

                        $('#btn_buscar_nuestros_estudios').click($.debounce(400, function () {
                            var txtBuscarNuestrosEstudios = $("#txtBuscarNuestrosEstudios").val();
                            //                    Si el campo de la busqueda no esta vacio.
                            if (txtBuscarNuestrosEstudios != '') {
                                // Si el campo de la busqueda tiene al menos 3 caracteres.
                                if (txtBuscarNuestrosEstudios.length >= 3) {
                                    cargarNuestrosEstudios(txtBuscarNuestrosEstudios);
                                } else {
                                }
                            } else {

                            }
                        }));
                        $('#btn_todos_nuestros_estudios').click($.debounce(400, function () {
                            $('#txtBuscarNuestrosEstudios').val('');
                            $('#txtBuscarNuestrosEstudios').parsley().reset();
                            cargarNuestrosEstudios();
                        }));
                    });
                </script>
            </div>
            <div class="col-12 contenedor-gestion contenedor-second">
                <div id="loading-div2" class='loading-div'></div>
                <h3>Lecturas recomendadas</h3>
                <button class="btn btn-primary" href="#modal-agregar-lectura" data-toggle="modal"><i class="fal fa-plus"></i> Agregar</button>
                <button class="btn btn-primary" name="btn_todas_lecturas" id="btn_todas_lecturas"><i class="fal fa-eye"></i> Ver todos</button>

                <form class="ajaxform mt-4" data-parsley-validate data-parsley-trigger="focusout" >
                    <script>$('.ajaxform').submit(false);</script>
                    <div class="input-group pr-1" >
                        <input type="text" name="txtBuscarLecturas" id="txtBuscarLecturas" placeholder="Buscar por Nombre, Año o Archivo..." class="form-control mr-1" required minlength="3" data-parsley-error-message="La busqueda debe contener al menos 3 caracteres!" data-parsley-errors-container="#errorContainer2" />
                        <div class="input-group-addon">
                            <button class="btn btn-primary form-control ml-1" name="btn_buscar_lecturas" id="btn_buscar_lecturas"><i class="fal fa-search-plus"></i> Buscar</button>
                        </div>
                    </div>
                    <div class="small-br"></div>
                    <div id="errorContainer2"></div>
                </form>
                <div id="lista_lecturas">
                </div>
                <script>
                    $(document).ready(function () {
                        //                 Llama a la funcion Cargar los usuarios al cargar la pagina por AJAX.
                        cargarLecturas();

                        //                Cargar usuarios por una busqueda o si no existe la busqueda, cargar todos los usuarios.
                        function cargarLecturas(query)
                        {
                            $.ajax({
                                url: "../ajax/politicas_publicas/buscar_lecturas.php",
                                method: "post",
                                data: {query: query},
                                success: function (data)
                                {
                                    $('#lista_lecturas').html(data);
                                },
                                error: function () {
                                    $('#lista_lecturas').html('Error en la conexion.');
                                }
                            });
                        }
                        //                Al clickear el boton de buscar, llama a funcion AJAX.

                        $('#btn_buscar_lecturas').click($.debounce(400, function () {
                            var txtBuscarLecturas = $("#txtBuscarLecturas").val();
                            //                    Si el campo de la busqueda no esta vacio.
                            if (txtBuscarLecturas != '') {
                                // Si el campo de la busqueda tiene al menos 3 caracteres.
                                if (txtBuscarLecturas.length >= 3) {
                                    cargarLecturas(txtBuscarLecturas);
                                } else {
                                }
                            } else {

                            }
                        }));
                        $('#btn_todas_lecturas').click($.debounce(400, function () {
                            $('#txtBuscarLecturas').val('');
                            $('#txtBuscarLecturas').parsley().reset();
                            cargarLecturas();
                        }));
                    });
                </script>
            </div>
            <div class="col-12 contenedor-gestion contenedor-third">
                <div id="loading-div2" class='loading-div'></div>
                <h3>Programas</h3>
                <button class="btn btn-primary" href="#modal-agregar-programa" data-toggle="modal"><i class="fal fa-plus"></i> Agregar</button>
                <button class="btn btn-primary" name="btn_todos_programas" id="btn_todos_programas"><i class="fal fa-eye"></i> Ver todos</button>

                <form class="ajaxform mt-4" data-parsley-validate data-parsley-trigger="focusout" >
                    <script>$('.ajaxform').submit(false);</script>
                    <div class="input-group pr-1" >
                        <input type="text" name="txtBuscarProgramas" id="txtBuscarProgramas" placeholder="Buscar por Nombre, Año o Archivo..." class="form-control mr-1" required minlength="3" data-parsley-error-message="La busqueda debe contener al menos 3 caracteres!" data-parsley-errors-container="#errorContainer3" />
                        <div class="input-group-addon">
                            <button class="btn btn-primary form-control ml-1" name="btn_buscar_programas" id="btn_buscar_programas"><i class="fal fa-search-plus"></i> Buscar</button>
                        </div>
                    </div>
                    <div class="small-br"></div>
                    <div id="errorContainer3"></div>
                </form>
                <div id="lista_programas">
                </div>
                <script>
                    $(document).ready(function () {
                        //                 Llama a la funcion Cargar los usuarios al cargar la pagina por AJAX.
                        cargarProgramas();

                        //                Cargar usuarios por una busqueda o si no existe la busqueda, cargar todos los usuarios.
                        function cargarProgramas(query)
                        {
                            $.ajax({
                                url: "../ajax/politicas_publicas/buscar_programas.php",
                                method: "post",
                                data: {query: query},
                                success: function (data)
                                {
                                    $('#lista_programas').html(data);
                                },
                                error: function () {
                                    $('#lista_programas').html('Error en la conexion.');
                                }
                            });
                        }
                        //                Al clickear el boton de buscar, llama a funcion AJAX.

                        $('#btn_buscar_programas').click($.debounce(400, function () {
                            var txtBuscarProgramas = $("#txtBuscarProgramas").val();
                            //                    Si el campo de la busqueda no esta vacio.
                            if (txtBuscarProgramas != '') {
                                // Si el campo de la busqueda tiene al menos 3 caracteres.
                                if (txtBuscarProgramas.length >= 3) {
                                    cargarProgramas(txtBuscarProgramas);
                                } else {
                                }
                            } else {

                            }
                        }));
                        $('#btn_todos_programas').click($.debounce(400, function () {
                            $('#txtBuscarProgramas').val('');
                            $('#txtBuscarProgramas').parsley().reset();
                            cargarProgramas();
                        }));
                    });
                </script>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
</div>