function mostrarMensaje(mensaje, titulo) {
    $(".x-msg").text(mensaje);
    $("#x-titulo").text(titulo);
    $('#modal-mensajes').modal('show');

    setTimeout(function () {

        $(".x-msg").text("");
        $("#x-titulo").text("");
        $('#modal-mensajes').modal('hide');
        $('#modal-mensajes').hide();
        $('.modal-backdrop').css('transition', '1');
        $('.modal-backdrop').css('opacity', '0');
        setTimeout(function () {
            $('.modal-backdrop').hide();
            $('body').css("overflow", "scroll")
        }, 100);
    }, 2000);

}
//SWITCH GESTION ESTUDIOS
$('#estudios-toggle').change(function () {
    if ($(this).prop('checked')) {
        $('#contenedor-nuestros-estudios').css('opacity', '1');
        $('#contenedor-nuestros-estudios').css('visibility', 'visible');
        $('#contenedor-lecturas-recomendadas').css('opacity', '0');
        $('#contenedor-lecturas-recomendadas').css('visibility', 'hidden');
    } else {
        $('#contenedor-nuestros-estudios').css('opacity', '0');
        $('#contenedor-nuestros-estudios').css('visibility', 'hidden');
        $('#contenedor-lecturas-recomendadas').css('opacity', '1');
        $('#contenedor-lecturas-recomendadas').css('visibility', 'visible');
    }
});

$(".link-normal.estudios").click(function (e) {
    var estNombre = $(this).data('nombre');
    var estDescripcion = $(this).data('descripcion');
    var estTipo = $(this).data('tipo');
    $("#modal-estudios-nombre").append("<h2 id='modal-estudios-nombre-txt' style='text-align: center;'>" + estNombre + "</h2>");
    $("#modal-estudios-nombre").append("<button type='button' id='modal-estudios-x' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
    $("#modal-estudios-descripcion").append("<p id='modal-estudios-descripcion-txt'>" + estDescripcion + "</p>");
    if (estTipo === 'estudio') {
        var estArchivo = $(this).data('archivo');
        $("#modal-estudios-footer").append("<a id='modal-estudios-archivo' href='" + baseurl + "uploads/documentos/estudios/" + estArchivo + "' download='" + estArchivo + "'><button class='btn btn-primary'>Descargar</button></a>");
        $("#modal-estudios-footer").append("<a id='modal-estudios-archivo-linea' target='_blank' href='" + baseurl + "uploads/documentos/estudios/" + estArchivo + "'><button class='btn btn-primary'>Ver en linea</button></a>");
    } else {
        var estEnlace = $(this).data('enlace');
        $("#modal-estudios-footer").append("<a id='modal-estudios-enlace' href='" + estEnlace + "' target='_blank'><button class='btn btn-primary'>Ver estudio</button></a>");
    }
});
$('#modal-estudios').on('hidden.bs.modal', function () {
    $("#modal-estudios-nombre-txt").remove();
    $("#modal-estudios-x").remove();
    $("#modal-estudios-descripcion-txt").remove();
    $("#modal-estudios-enlace").remove();
    $("#modal-estudios-archivo").remove();
    $("#modal-estudios-archivo-linea").remove();

});


$(".btn.btn-danger.eliminar").click(function (e) {
    var idEliminar = $(this).data('id');
    var tipo = $(this).data('tipo');
    var ruta = $(this).data('ruta')

    $("#modal-header-eliminar").append("<h4 id='modal-header-eliminar-titulo'class='modal-title'>Eliminar " + tipo + "</h4>");
    $("#modal-header-eliminar").append("<button id='btn-modal-eliminar-x' type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>");
    $("#modal-footer-eliminar").append("<a href='" + baseurl + ruta + idEliminar + "' id='btn-modal-eliminar' class='btn btn-danger eliminar' ><i class='fas fa-trash-alt'></i> Eliminar</a>");
    $("#modal-footer-eliminar").append("<a id='btn-modal-eliminar-cancelar' class='btn btn-info' data-dismiss='modal'><i class='fas fa-ban'></i> Cancelar</a>");
});
$('#modal-eliminar').on('hidden.bs.modal', function () {
    $("#btn-modal-eliminar-x").remove();
    $("#modal-header-eliminar-titulo").remove();
    $("#btn-modal-eliminar").remove();
    $("#btn-modal-eliminar-cancelar").remove();

});

$(".btn-abrir-modal-contenido").click(function (e) {
    var tipoContenido = $(this).data('tipo');
    var textoContenido = $(this).data('texto');
    $("#modal-contenido-nombre").append("<input type='text' id='input-contenido-nombre' class='form-control' name='txtNombre' value='" + tipoContenido + "' disabled>");
    $("#modal-contenido-texto").append("<textarea id='input-contenido-texto' name='txtTexto' class='form-control' >" + textoContenido + "</textarea>");
    $("#modal-contenido-texto").append("<input id='input-contenido-tipo' type='hidden' value='" + tipoContenido + "' name='txtTipo'>");
   
});
$('#modal-contenido').on('hidden.bs.modal', function () {
    $("#input-contenido-nombre").remove();
    $("#input-contenido-texto").remove();
    $("#input-contenido-tipo").remove();
});
