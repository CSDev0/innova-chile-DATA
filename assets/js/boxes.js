
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
    var usuario_modificacion = $(opener).attr('usuario_modificacion');
    var ultima_modificacion = $(opener).attr('ultima_modificacion');

//Colocamos las variables dentro del formulario de modificar usuario.
    $('#formulario-modificar-pregunta').find('[name="txtId"]').val(id);
    $('#formulario-modificar-pregunta').find('[name="txtNombre"]').val(nombre);
    $('#formulario-modificar-pregunta').find('[name="txtTexto"]').summernote('code', texto);
    $('#formulario-modificar-pregunta').find('[name="txtUltimaModificacion"]').html('Ultima modificación por ' + usuario_modificacion + ' ' + ultima_modificacion);
});

$('#modal-ver-actividad').on('show.bs.modal', function (e) {

    var opener = e.relatedTarget;// esta variable contiene el objeto el cual llamo a abrir el modal.
    //obtenemos los detalles de los atributos.
    var actividad = $(opener).attr('actividad');
    var tipo = $(opener).attr('tipo');
    var usuario = $(opener).attr('usuario');
    var fecha = $(opener).attr('fecha');
    var txt_antiguo = $(opener).attr('txt_antiguo');
    var txt_nuevo = $(opener).attr('txt_nuevo');

//Colocamos las variables dentro del formulario de modificar usuario.
    $('#formulario-actividad').find('[name="titulo-actividad"]').html('<b>'+usuario+'</b> realizo la acción <b>'+tipo+'</b> '+actividad);
    if(txt_antiguo.length > 0){
        $('#conten-texto-antiguo').show();
            $('#formulario-actividad').find('[name="txt_antiguo"]').summernote('code', txt_antiguo);
    }else{
        $('#conten-texto-antiguo').hide();
    }
    if(txt_nuevo.length > 0){
        $('#conten-texto-nuevo').show();
        $('#formulario-actividad').find('[name="txt_nuevo"]').summernote('code', txt_nuevo);
    }else{
        $('#conten-texto-nuevo').hide();
    }
     $('#formulario-actividad').find('[name="txtUltimaModificacion"]').html('Acción realizada por: '+usuario+' con fecha: '+fecha + ' ');

});



$("#modal-eliminar").on('show.bs.modal', function (e) {
    var opener = e.relatedTarget;// esta variable contiene el objeto el cual llamo a abrir el modal.
    //obtenemos los detalles de los atributos.
    var id = $(opener).attr('id');
    var nombre = $(opener).attr('nombre');
    var tipo = $(opener).attr('tipo');
    var ruta = $(opener).attr('ruta');

    $(this).find('[id="titulo-eliminar"]').html('Eliminar ' + tipo);
    $(this).find('[id="pregunta-eliminar"]').html('¿Estas seguro de eliminar ' + tipo + ': <span class="color-azul">"' + nombre + '"</span>?');
    $(this).find('[id="boton-eliminar"]').attr('href', baseurl + ruta + id);
});

//Agrgar o remover imputs para los link de pie de pagina
var counter=$('#counter').val();
savePie(counter);
$('#addButton').click(function () {
  addInput(counter);
  counter++;
});
$('#removeButton').click(function () {
  counter--;
  removeInput(counter);
});

$('#saveBtnPie').click(function () {
  savePie(counter);
});

function addInput() {
  if (counter>6){
    alert("Maximo de 6 links alcanzados");
    return false;
  }
  var v = parseInt(counter)+1;
  var newTextBoxDivA = $(document.createElement('div')).attr('id','TextBoxDivA'+v);
  newTextBoxDivA.after().html('<input type="text" class="form-control" placeholder="titulo'+v+'" name="textboxA'+v+'" id="textboxA'+v+'"><hr>');
  newTextBoxDivA.appendTo('#TextBoxesGroupA');

  var newTextBoxDivB = $(document.createElement('div')).attr('id','TextBoxDivB'+v);
  newTextBoxDivB.after().html('<input type="text" class="form-control" placeholder="titulo'+v+'" name="textboxB'+v+'" id="textboxB'+v+'"><hr>');
  newTextBoxDivB.appendTo('#TextBoxesGroupB');

}

function removeInput() {
  if(counter==0){
    alert("No hay mas que remover");
    return false;
  }
  var v = parseInt(counter)+1;
  $('#TextBoxDivA'+v).remove();
  $('#TextBoxDivB'+v).remove();
}

function savePie() {
  var titulos=[];
  var links=[];
  var sjson = '{'
  var v=1
  for (var i = 0; i <counter; i++) {
     //titulos[i]=$('#textboxA'+i).val();
     //links[i]=$('#textboxB'+i).val();

     if (i == (counter-1)) {
       sjson = sjson + '"'+i+'":["'+$('#textboxA'+v).val()+'","'+$('#textboxB'+v).val()+'"]}';
     }else {
       sjson = sjson + '"'+i+'":["'+$('#textboxA'+v).val()+'","'+$('#textboxB'+v).val()+'"],';
     }
     v++;
  }
  $('#pie_title').val(sjson);
  //$('#pie_title').val(titulos.toString());
  //$('#pie_link').val(links.toString());
}
