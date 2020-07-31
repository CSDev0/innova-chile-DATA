<h2 class='mt-2'> Gestionar <b>Convocatorias</b></h2>
<hr>
<div class="row pr-4">
    <div class="col-12 contenedor-gestion">
        <h3><b>Repositorio</b></h3>
        <p>Aquí podras modificar el repositorio de <b class="color-azul">Github</b> del cual provengan las <b class="color-azul">Convocatorias</b>.</p>
        <button class="btn btn-primary m-text d-flex align-items-center" href="#modal-repositorio" data-toggle="modal" usuario="<?= $repo->usuario ?>"
                repositorio="<?= $repo->repositorio ?>" ultima_modificacion="<?= $repo->ultima_modificacion ?>" usuario_modificacion="<?= utils::getUsuarioNombre($repo->Usuario_id) ?>">
            <i class="fab fa-github fa-2x mr-2"></i>Gestionar repositorio</button>
        <br>
        <div class="col-sm bg-gris rounded p-2 mb-3">
            <p >Una vez hayas guardado los datos del repositorio, debemos descargarlo y descomprimirlo para poder utilizar las convocatorias<br>
                <b class="color-rojo xs-text">Utiliza esta función para cuando se hayan realizado cambios en el repositorio o cuando se haya configurado un nuevo repositorio.</b></p>
            <a class="btn btn-warning" href="<?= base_url . 'convocatoria/downloadAndUnzip' ?>"><i class="fas fa-exclamation-triangle"></i></i> Descargar el repositorio y descomprimir todo <i class="fas fa-exclamation-triangle"></i></a>
        </div>
        <hr>
        <?php
        if (file_exists('uploads/repo/' . $repo->repositorio . '-master')) {
            echo '<p class="xs-text">Estos son los archivos actuales del repositorio descargado: <br>';
            require_once('views/data/ver-repositorio.php');
        } else {
            echo '<p class="xs-text">No hay repositorio descargado y descomprimido aún. <br>';
        }
        ?>
    </div>
    <div class="col-12 contenedor-gestion">
        <div id="loading-div" class='loading-div'></div>
        <h3><b>Convocatorias</b></h3>
        <p>Aquí podras agregar y eliminar las <b class="color-azul">Convocatorias</b>, para esto, primero se debe descargar el repositorio de <b class="color-azul">Github</b> que contiene las convocatorias.</p>

        <button class="btn btn-primary" href="#modal-agregar-convocatoria" data-toggle="modal"><i class="fas fa-plus-square"></i> Agregar</button>
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
                            url: "../ajax/buscar_convocatorias.php",
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
    </div>