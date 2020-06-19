
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

$('#modal-contenido').on('show.bs.modal', function (e) {
    var opener = e.relatedTarget;// esta variable contiene el objeto el cual llamo a abrir el modal.
    //obtenemos los detalles de los atributos.
    var nombre = $(opener).attr('nombre')
    var tipo = $(opener).attr('tipo');
    var texto = $(opener).attr('texto');
    var ultima_modificacion = $(opener).attr('ultima_modificacion');
    var usuario_modificacion = $(opener).attr('usuario_modificacion');

    $('#formulario-texto').find('[name="txtNombre"]').val(nombre);
    $('#formulario-texto').find('[name="txtTexto"]').summernote('code', texto);
    if (ultima_modificacion.length < 1) {
        $('#formulario-texto').find('[name="txtUltimaModificacion"]').html('Ultima modificación: No ha sido modificado nunca');
    } else {
        $('#formulario-texto').find('[name="txtUltimaModificacion"]').html('Ultima modificación: ' + ultima_modificacion + ' por ' + usuario_modificacion);
    }
    $('#formulario-texto').find('[name="txtTipo"]').val(tipo);
});


$('#modal-modificar-usuario').on('show.bs.modal', function (e) {

    var opener = e.relatedTarget;// esta variable contiene el objeto el cual llamo a abrir el modal.
    //obtenemos los detalles de los atributos.
    var id = $(opener).attr('id');
    var rut = $(opener).attr('rut');
    var nombre = $(opener).attr('nombre');
    var apellido = $(opener).attr('apellido');
    var correo = $(opener).attr('correos');
    var genero = $(opener).attr('genero');
    var activado = $(opener).attr('activado');



//Colocamos las variables dentro del formulario de modificar usuario.
    $('#formulario-modificar-usuario').find('[name="txtId"]').val(id);
    $('#formulario-modificar-usuario').find('[name="txtRut"]').val(rut);
    $('#formulario-modificar-usuario').find('[name="txtNombre"]').val(nombre);
    $('#formulario-modificar-usuario').find('[name="txtApellido"]').val(apellido);
    $('#formulario-modificar-usuario').find('[name="txtCorreo"]').val(correo);
    $('#formulario-modificar-usuario').find('[name="slcGenero"]').val(genero);
    $('#formulario-modificar-usuario').find('[name="slcEstado"]').val(activado);
});

$('#modal-modificar-estudio').on('show.bs.modal', function (e) {

    var opener = e.relatedTarget;// esta variable contiene el objeto el cual llamo a abrir el modal.
    //obtenemos los detalles de los atributos.
    var id = $(opener).attr('id');
    var nombre = $(opener).attr('nombre');
    var descripcion = $(opener).attr('descripcion');
    var ano_estudio = $(opener).attr('ano_estudio');
    var archivo = $(opener).attr('archivo');
    var ultima_modificacion = $(opener).attr('ultima_modificacion');
    var usuario_modificacion = $(opener).attr('usuario_modificacion');

//Colocamos las variables dentro del formulario de modificar usuario.
    $('#formulario-modificar-estudio').find('[name="txtId"]').val(id);
    $('#formulario-modificar-estudio').find('[name="txtNombre"]').val(nombre);
    $('#formulario-modificar-estudio').find('[name="txtDescripcion"]').summernote('code', descripcion);
    $('#slcAno-estudio').val(ano_estudio);
    if (archivo == null || archivo == '') {
        $('#formulario-modificar-estudio').find('[name="archivoAntiguo"]').html("No hay archivo asignado");
        $('#formulario-modificar-estudio').find('[name="archivoAntiguo"]').css('pointer-events', 'none');
    } else {
        $('#formulario-modificar-estudio').find('[name="archivoAntiguo"]').html("Ver archivo actual");
        $('#formulario-modificar-estudio').find('[name="archivoAntiguo"]').css('pointer-events', 'auto');
        $('#formulario-modificar-estudio').find('[name="archivoAntiguo"]').attr("href", baseurl + "uploads/documentos/estudios/" + archivo);

    }
    $('#formulario-modificar-estudio').find('[name="txtUltimaModificacion"]').html('Ultima modificacion: ' + ultima_modificacion + ' por ' + usuario_modificacion + ' ');




});
$('#modal-modificar-lectura').on('show.bs.modal', function (e) {

    var opener = e.relatedTarget;// esta variable contiene el objeto el cual llamo a abrir el modal.
    //obtenemos los detalles de los atributos.
    var id = $(opener).attr('id');
    var nombre = $(opener).attr('nombre');
    var descripcion = $(opener).attr('descripcion');
    var ano_lectura = $(opener).attr('ano_lectura');
    var enlace = $(opener).attr('enlace');
    var ultima_modificacion = $(opener).attr('ultima_modificacion');
    var usuario_modificacion = $(opener).attr('usuario_modificacion');

//Colocamos las variables dentro del formulario de modificar usuario.
    $('#formulario-modificar-lectura').find('[name="txtId"]').val(id);
    $('#formulario-modificar-lectura').find('[name="txtNombre"]').val(nombre);
    $('#formulario-modificar-lectura').find('[name="txtDescripcion"]').summernote('code', descripcion);
    $('#slcAno-lectura').val(ano_lectura);
    $('#formulario-modificar-lectura').find('[name="txtEnlace"]').val(enlace);
    $('#formulario-modificar-lectura').find('[name="txtUltimaModificacion"]').html('Ultima modificacion: ' + ultima_modificacion + ' por ' + usuario_modificacion + ' ');
});

$('#modal-modificar-pregunta').on('show.bs.modal', function (e) {
    var opener = e.relatedTarget;// esta variable contiene el objeto el cual llamo a abrir el modal.
    //obtenemos los detalles de los atributos.
    var id = $(opener).attr('id');
    var nombre = $(opener).attr('pregunta');
    var texto = $(opener).attr('respuesta');

    var fecha_modificacion = $(opener).attr('fecha_modificacion');

//Colocamos las variables dentro del formulario de modificar usuario.
    $('#formulario-modificar-pregunta').find('[name="txtId"]').val(id);
    $('#formulario-modificar-pregunta').find('[name="txtNombre"]').val(nombre);
    $('#formulario-modificar-pregunta').find('[name="txtTexto"]').summernote('code', texto);
});