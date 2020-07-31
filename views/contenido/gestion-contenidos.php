<?php
require_once('models/Usuario.php');
$qui = utils::getContenidoByTipo('Quienes Somos');

$des = utils::getContenidoByTipo('Datos destacados');
$dat = utils::getContenidoByTipo('Data');
$est = utils::getContenidoByTipo('Estudios');
$chi = utils::getContenidoByTipo('Chile en el mundo');
$lec = utils::getContenidoByTipo('Lecturas');
?>
<script>
var clipboard = new ClipboardJS('.btn');
$('button').tooltip({
  trigger: 'click',
  placement: 'bottom'
});

function setTooltip(btn, message) {
  $(btn).tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
}

function hideTooltip(btn) {
  setTimeout(function() {
    $(btn).tooltip('hide');
  }, 1000);
}

// Clipboard

clipboard.on('success', function(e) {
  setTooltip(e.trigger, 'Enlace copiado!');
  hideTooltip(e.trigger);
});

clipboard.on('error', function(e) {
  setTooltip(e.trigger, 'Ha fallado la copia!');
  hideTooltip(e.trigger);
});
</script>
<div class="pr-2">
<h2> Gestionar <b>Textos y Archivos</b></h2>
<hr>
    <div class="col-12 m-0 contenedor-gestion">
        <h3><b>Textos</b></h3>
        <div class="row">
    <p class="col-12"> A continuación se encuentran los botones correspondientes a cada sección de la pagina principal, en la cual podrás editar los textos referentes a ellas.</p>
</div>
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" tipo="<?php if($qui){ echo $qui->tipo;} ?>"

                texto="<?php if($qui){echo htmlentities($qui->texto);} ?>" usuario_modificacion="<?php if($qui){echo utils::getUsuarioNombre($qui->Usuario_id);} ?>"

                ultima_modificacion="<?php if($qui){echo utils::getTiempo($qui->ultima_modificacion);} ?>" nombre="<?php if($qui){echo $qui->nombre;}?>">

            <i class="fas fa-edit"></i> Quienes somos</button>

        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" tipo="<?php if($des){echo $des->tipo;} ?>"

                texto="<?php if($des){echo htmlentities($des->texto);} ?>" usuario_modificacion="<?php if($des){ echo utils::getUsuarioNombre($des->Usuario_id);} ?>"

                ultima_modificacion="<?php if($des){echo utils::getTiempo($des->ultima_modificacion);} ?>" nombre="<?php if($des){echo $des->nombre;}?>">

            <i class="fas fa-edit"></i> Datos destacados</button>

        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" tipo="<?php if($dat){echo $dat->tipo;}?>"

                texto="<?php if($dat){echo htmlentities($dat->texto);} ?>" usuario_modificacion="<?php if($dat){echo utils::getUsuarioNombre($dat->Usuario_id);} ?>"
                ultima_modificacion="<?php if($dat){echo utils::getTiempo($dat->ultima_modificacion);} ?>" nombre="<?php if($dat){echo $dat->nombre;}?>">

            <i class="fas fa-edit"></i> Data </button>

        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" tipo="<?php if($est){echo $est->tipo;} ?>"

                texto="<?php if($est){echo htmlentities($est->texto);} ?>" usuario_modificacion="<?php if($est){echo utils::getUsuarioNombre($est->Usuario_id);} ?>"

                ultima_modificacion="<?php  if($est){echo utils::getTiempo($est->ultima_modificacion);} ?>" nombre="<?php if($est){echo $est->nombre;}?>">

            <i class="fas fa-edit"></i> Estudios</button>

        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" tipo="<?php if($est){echo $est->tipo;} ?>"

                texto="<?php if($lec){echo htmlentities($lec->texto);} ?>" usuario_modificacion="<?php if($lec){echo utils::getUsuarioNombre($lec->Usuario_id);} ?>"

                ultima_modificacion="<?php  if($lec){echo utils::getTiempo($lec->ultima_modificacion);} ?>" nombre="<?php if($lec){echo $lec->nombre;}?>">

            <i class="fas fa-edit"></i> Lecturas</button>
<div class="row mt-2 pl-0 m-0">
            <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" tipo="<?php if($chi){echo $chi->tipo;}else{ echo 'Chile en el mundo';} ?>"

                 texto="<?php if($chi){echo htmlentities($chi->texto);} ?>" usuario_modificacion="<?php if($chi){echo utils::getUsuarioNombre($chi->Usuario_id);} ?>"

                 ultima_modificacion="<?php if($chi){echo utils::getTiempo($chi->ultima_modificacion);} ?>" nombre="<?php if($chi){echo $chi->nombre;}?>">

            <i class="fas fa-edit"></i> Chile en el mundo</button>
</div>
        <br><br>
    </div>
<div class="col-12 m-0 mt-2 contenedor-gestion">
        <div id="loading-div" class='loading-div'></div>
        <h3><b>Archivos e imagenes</b></h3>
        <p> Aquí podras agregar archivos e imagenes para usarlas a traves de su enlace en los textos de la pagina.</p>
        <button class="btn btn-primary" href="#modal-agregar-archivo" data-toggle="modal"><i class="fas fa-plus-square"></i> Agregar</button>
        <button class="btn btn-primary" name="btn_todos_archivos" id="btn_todos_archivos"><i class="fas fa-eye"></i> Ver todos</button>
        <hr>
        <form class="ajaxform" data-parsley-validate data-parsley-trigger="focusout" >
            <script>$('.ajaxform').submit(false);</script>
            <div class="input-group pr-1">
                <input type="text" id="txtBuscarArchivos" placeholder="Buscar por nombre del archivo..." class="form-control mr-1" required minlength="3" data-parsley-error-message="La busqueda debe contener al menos 3 caracteres!" data-parsley-errors-container="#errorContainer1" />
                <div class="input-group-addon">
                    <button class="btn btn-primary form-control ml-1"  id="btn_buscar_archivos"><i class="fas fa-search-plus"></i> Buscar</button>
                </div>
            </div>
            <div class="small-br"></div>
            <div id="errorContainer1"></div>
        </form>
        <div id="lista_archivos">
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
                cargarArchivos();

//                Cargar usuarios por una busqueda o si no existe la busqueda, cargar todos los usuarios.
                function cargarArchivos(query)
                {
                    $.ajax({
                        url: "../ajax/buscar_archivos.php",
                        method: "post",
                        data: {query: query},
                        success: function (data)
                        {
                            $('#lista_archivos').html(data);
                        },
                        error: function () {
                            $('#lista_archivos').html('Error en la conexion.')
                        }
                    });
                }
//                Al clickear el boton de buscar, llama a funcion AJAX.

                $('#btn_buscar_archivos').click($.debounce(400, function () {
                    var txtBuscarArchivos = $("#txtBuscarArchivos").val();
//                    Si el campo de la busqueda no esta vacio.
                    if (txtBuscarArchivos != '') {
                        // Si el campo de la busqueda tiene al menos 3 caracteres.
                        if (txtBuscarArchivos.length >= 3) {
                            cargarArchivos(txtBuscarArchivos);
                        }
                    } else {

                    }
                }));
                $('#btn_todos_archivos').click($.debounce(400, function () {
                    $('#txtBuscarArchivos').parsley().reset();
                    cargarArchivos();
                }));
            });
        </script>

    </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>
</div>
</div>
</div>