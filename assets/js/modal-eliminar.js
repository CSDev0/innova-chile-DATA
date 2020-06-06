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