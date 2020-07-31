<?php ?>
<h2> Gestionar <b>Estudios</b></h2>
<hr>
<div class="row">
    <div class='col-sm'>
    <input data-size="s"type="checkbox" id="estudios-toggle" checked data-toggle="toggle" data-on="Nuestros estudios" data-off="Lecturas recomendadas" data-onstyle="nuestros" data-offstyle="recomendadas">
    </div>
    <div class="col-12 contenedor-estudios" id="contenedor-nuestros-estudios">
        <div id="loading-div" class='loading-div'></div>
        <h3>Nuestros estudios</h3>
        <button class="btn btn-primary" href="#modal-agregar-estudio" data-toggle="modal"><i class="fas fa-plus-square"></i> Agregar</button>
        <button class="btn btn-primary" name="btn_todos_nuestros_estudios" id="btn_todos_nuestros_estudios"><i class="fas fa-eye"></i> Ver todos</button>
        <hr>
        <form class="ajaxform" data-parsley-validate data-parsley-trigger="focusout" >
            <script>$('.ajaxform').submit(false);</script>
            <div class="input-group pr-1">
                <input type="text" name="txtBuscarNuestrosEstudios" id="txtBuscarNuestrosEstudios" placeholder="Buscar por Nombre, Año o Archivo..." class="form-control mr-1" required minlength="3" data-parsley-error-message="La busqueda debe contener al menos 3 caracteres!" data-parsley-errors-container="#errorContainer1" />
                <div class="input-group-addon">
                    <button class="btn btn-primary form-control ml-1" name="btn_buscar_nuestros_estudios" id="btn_buscar_nuestros_estudios"><i class="fas fa-search-plus"></i> Buscar</button>
                </div>
            </div>
            <div class="small-br"></div>
            <div id="errorContainer1"></div>
        </form>
        <div id="lista_nuestros_estudios">
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
                cargarNuestrosEstudios();

//                Cargar usuarios por una busqueda o si no existe la busqueda, cargar todos los usuarios.
                function cargarNuestrosEstudios(query)
                {
                    $.ajax({
                        url: "../ajax/buscar_nuestros_estudios.php",
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
                    $('#txtBuscarNuestrosEstudios').parsley().reset();
                    cargarNuestrosEstudios();
                }));
            });
        </script>
    </div>
</div>
<div class="row pr-5">
    <div class="col-12 contenedor-lecturas" id="contenedor-lecturas-recomendadas">
         <div id="loading-div2" class='loading-div'></div>
        <h3>Lecturas recomendadas</h3>
        <button class="btn btn-primary" href="#modal-agregar-lectura" data-toggle="modal"><i class="fas fa-plus-square"></i> Agregar</button>
        <button class="btn btn-primary" name="btn_todos_nuestras_lecturas" id="btn_todos_nuestras_lecturas"><i class="fas fa-eye"></i> Ver todos</button>
        <hr>
        <form class="ajaxform" data-parsley-validate data-parsley-trigger="focusout" >
            <script>$('.ajaxform').submit(false);</script>
            <div class="input-group pr-1" >
                <input type="text" name="txtBuscarNuestrasLecturas" id="txtBuscarNuestrasLecturas" placeholder="Buscar por Nombre, Año o Archivo..." class="form-control mr-1" required minlength="3" data-parsley-error-message="La busqueda debe contener al menos 3 caracteres!" data-parsley-errors-container="#errorContainer2" />
                <div class="input-group-addon">
                    <button class="btn btn-primary form-control ml-1" name="btn_buscar_nuestras_lecturas" id="btn_buscar_nuestras_lecturas"><i class="fas fa-search-plus"></i> Buscar</button>
                </div>
            </div>
            <div class="small-br"></div>
            <div id="errorContainer2"></div>
        </form>
        <div id="lista_nuestras_lecturas">
        </div>
        <script>
            $(document).ready(function () {
//              Funcion para mostrar un spinner loading para AJAX.
                $('#loading-div2').hide();
                var $loading = $('#loading-div2');
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
                cargarNuestrasLecturas();

//                Cargar usuarios por una busqueda o si no existe la busqueda, cargar todos los usuarios.
                function cargarNuestrasLecturas(query)
                {
                    $.ajax({
                        url: "../ajax/buscar_nuestras_lecturas.php",
                        method: "post",
                        data: {query: query},
                        success: function (data)
                        {
                            $('#lista_nuestras_lecturas').html(data);
                        },
                        error: function () {
                            $('#lista_nuestras_lecturas').html('Error en la conexion.');
                        }
                    });
                }
//                Al clickear el boton de buscar, llama a funcion AJAX.

                $('#btn_buscar_nuestras_lecturas').click($.debounce(400, function () {
                    var txtBuscarNuestrasLecturas = $("#txtBuscarNuestrasLecturas").val();
//                    Si el campo de la busqueda no esta vacio.
                    if (txtBuscarNuestrasLecturas != '') {
                        // Si el campo de la busqueda tiene al menos 3 caracteres.
                        if (txtBuscarNuestrasLecturas.length >= 3) {
                            cargarNuestrasLecturas(txtBuscarNuestrasLecturas);
                        } else {
                        }
                    } else {

                    }
                }));
                $('#btn_todos_nuestras_lecturas').click($.debounce(400, function () {
                    $('#txtBuscarNuestrasLecturas').parsley().reset();
                    cargarNuestrasLecturas();
                }));
            });
        </script>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>
</div>
</div>
