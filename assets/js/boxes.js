

function mostrarMensaje(mensaje, titulo) {
    $(".x-msg").text(mensaje);
    $("#x-titulo").text(titulo);
    $('#modal-mensajes').modal('toggle')
    setTimeout(function () {
        $('#modal-mensajes').modal('hide')
        $(".x-msg").text("");
        $("#x-titulo").text("");
        
    }, 1500);
}