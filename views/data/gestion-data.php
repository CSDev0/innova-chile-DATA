<h2 class='mt-2'> Gestionar <b>Data</b></h2>
<hr>
<div class="row">
    <div class="col-sm-10 contenedor-gestion">
        <h3><b>Repositorio</b></h3>
        <p>Aquí podras modificar el repositorio de <b class="color-azul">Github</b> del cual provengan los <b class="color-azul">Graficos destacados</b>.</p>
        <button class="btn btn-primary m-text d-flex align-items-center" href="#modal-repositorio" data-toggle="modal" usuario="<?= $repo->usuario ?>"
                repositorio="<?= $repo->repositorio ?>" ultima_modificacion="<?= $repo->ultima_modificacion ?>" usuario_modificacion="<?= utils::getUsuarioNombre($repo->Usuario_id) ?>">
            <i class="fab fa-github fa-2x mr-2"></i>Gestionar repositorio</button>
        <br>
        <div class="col-sm bg-gris rounded p-2 mb-3"> 
            <p >Una vez hayas guardado los datos del repositorio, debemos descargarlo y descomprimirlo para poder utilizar los graficos en la sección de Graficos destacados <br>
                <b class="color-rojo xs-text">Utiliza esta función para cuando se hayan realizado cambios en el repositorio o cuando se haya configurado un nuevo repositorio.</b></p>        
            <a class="btn btn-warning" href="<?= base_url . 'data/downloadAndUnzip' ?>"><i class="fas fa-exclamation-triangle"></i></i> Descargar el repositorio y descomprimir todo <i class="fas fa-exclamation-triangle"></i></a>
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
    <div class="col-sm-10 contenedor-gestion">
        <div id="loading-div" class='loading-div'></div>
        <h3><b>Graficos destacados</b></h3>
        <p>Aquí podras agregar, modificar y eliminar los graficos destacados de la sección <b class="color-azul">Graficos destacados</b>, para esto, primero se debe descargar el repositorio de <b class="color-azul">Github</b> que contiene los graficos.</p>

        <button class="btn btn-primary" href="#modal-agregar-grafico" data-toggle="modal"><i class="fas fa-plus-square"></i> Agregar</button>
        <button class="btn btn-primary" id="btn_todos_graficos"><i class="fas fa-eye"></i> Ver todos</button>
        <hr>
        <form class="ajaxform" data-parsley-validate data-parsley-trigger="focusout" >
            <script>$('.ajaxform').submit(false);</script>
            <div class="input-group"">
                <input type="text" name="txtBuscarGraficos" id="txtBuscarGraficos" placeholder="Buscar por nombre de archivo..." class="form-control mr-1" required minlength="3" data-parsley-error-message="La busqueda debe contener al menos 3 caracteres!" data-parsley-errors-container="#errorContainer" />
                <div class="input-group-addon">
                    <button class="btn btn-primary form-control ml-1" id="btn_buscar_graficos"><i class="fas fa-search-plus"></i> Buscar</button>
                </div>
            </div>
            <div class="small-br"></div>
            <div id="errorContainer"></div>
        </form>
        <div id="lista_graficos">
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
                            setTimeout(function () {
                                $loading.hide();
                            }, 500);
                        });
//                 Llama a la funcion Cargar los usuarios al cargar la pagina por AJAX.
                cargarGraficos();

//                Cargar usuarios por una busqueda o si no existe la busqueda, cargar todos los usuarios.
                function cargarGraficos(query)
                {
                    $.ajax({
                        url: "../ajax/buscar_graficos_destacados.php",
                        method: "post",
                        data: {query: query},
                        success: function (data)
                        {
                            $('#lista_graficos').html(data);
                        },
                        error: function () {
                            $('#lista_graficos').html('Error en la conexion.')
                        }
                    });
                }
//                Al clickear el boton de buscar, llama a funcion AJAX.

                $('#btn_buscar_graficos').click($.debounce(400, function () {
                    var txtBuscarGraficos = $("#txtBuscarGraficos").val();
//                    Si el campo de la busqueda no esta vacio.
                    if (txtBuscarGraficos != '') {
                        // Si el campo de la busqueda tiene al menos 3 caracteres.
                        if (txtBuscarGraficos.length >= 3) {
                            cargarGraficos(txtBuscarGraficos);
                        } else {
                        }
                    } else {

                    }
                }));
                $('#btn_todos_graficos').click($.debounce(400, function () {
                    $('#txtBuscarGraficos').parsley().reset();
                    cargarGraficos();
                }));
            });

        </script>
    </div>
    <div class="col-sm-10 contenedor-gestion">
        <h3><b>Datos destacados</b></h3>
        <p>Aquí podras modificar las variables ubicadas en <b class="color-azul">Datos destacados</b>.</p>
        <form action="<?php echo base_url . 'contenido/updateDatos'; ?>" method="post" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-sm-2 text-right align-self-center">
                    <label class="">Millones aportados: </label>
                </div>
                <div class="col-sm-2 text-left">
                    <input type="number" value="<?php if(isset($dato_millones) && $dato_millones->texto != ''){echo $dato_millones->texto;}?>" name="txtDatoMillones" class="form-control"/> 
                </div>
                <div class="col-sm-2 text-right align-self-center">
                    <label class="">Iniciativas apoyadas: </label>
                </div>
                <div class="col-sm-2 text-left">
                    <input type="number" value="<?php if(isset($dato_iniciativas) && $dato_iniciativas->texto != '' ){echo $dato_iniciativas->texto;}?>" name="txtDatoIniciativas"  class="form-control"/> 
                </div>
                <div class="col-sm-2 text-right align-self-center">
                    <label class="">Beneficiados: </label>
                </div>
                <div class="col-sm-2 text-left">
                    <input type="number" value="<?php if(isset($dato_beneficiados) && $dato_beneficiados->texto != '' ){echo $dato_beneficiados->texto;}?>" name="txtDatoBeneficiados" class="form-control"/> 
                </div>
            </div>
            <hr class="bc-celeste">
            <div class="row justify-content-end">
                <a href="<?= base_url . 'gestion/data' ?>" type="button" class="btn btn-danger mr-2" ><i class="fas fa-times"></i> Cancelar</a>
                <button type="submit" class="btn btn-success mr-3"><i class="fas fa-save"></i> Guardar cambios</button>
            </div>
        </form>
    </div>


</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

</div>



