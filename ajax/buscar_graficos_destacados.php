<?php

require_once "../config/db.php";
require_once "../config/parameters.php";
require_once "../helpers/utils.php";
require_once "../models/Grafico_destacado.php";

$grafico = new Grafico_destacado();
$output = '';
if (isset($_POST["query"])) {
    $busqueda = $_POST['query'];
    $resultado = $grafico->search($busqueda);
    ?><script>$("tbody").sortable("disable");</script><?php
} else {
    $resultado = $grafico->search('all');
    ?>
    <script>
        $("tbody").sortable({
            handle: '.drag-icon',
            axis: 'y',
            update: function (event, ui) {
                var data = $(this).sortable('serialize');

    //         POST to server using $.post or $.ajax
                    $.ajax({
                        url: "../ajax/ordenar_graficos.php",
                        method: "post",
                        data: data,
                        success: function (data)
                        {
                            $('#resultado_orden').css('transition', '1s');
                            $('#resultado_orden').css('opacity', 1);
                            $('#resultado_orden').html('Ordenado correctamente!');
                            setTimeout(function(){
                                $('#resultado_orden').css('opacity', 0);
                            }, 2000);
                            
                        },
                        error: function () {
                            $('#resultado_orden').html('Error al ordenar');
                        }
                    });
                }
            });
    </script>
    <?php
}
if ($resultado != null) {
    if (mysqli_num_rows($resultado) > 0) {
        $output .= '<h4 id="resultado_orden"></h4>
            <div class="table-responsive">
                                    <table class="table table-striped"">
                                        <tr>
                                            <th>Ordenar</th>
                                            <th scope="col">Archivo</th>
                                            <th scope="col">Gestión</th>
                                        </tr>
                                        <tbody>';
        while ($obj = mysqli_fetch_array($resultado)) {
            $archivo = substr($obj['archivo'], strrpos($obj['archivo'], '/') + 1);
            $output .= '
                    <tr id="grafico-' . $obj['id'] . '">
                            <td><i class="fas fa-arrows-alt fa-lg drag-icon"></i></td>
                            <td><a class="link-normal small" href="' . base_url . $obj['archivo'] . '" target="_blank">' . $archivo . '</a></td>
                            <td>
                        <a href="#modal-eliminar" data-toggle="modal" ruta="data/deleteGrafico&id=" tipo="Grafico destacado" id="' . $obj['id'] . '" nombre="' . $archivo . '"  class="btn btn-danger eliminar"
                           style="margin-top: 5px; width: 100%;" >
                           <i class="fas fa-trash-alt"></i> Eliminar</a>
                            </td>
                    </tr>';
        }
        $output .= '</tbody>';
        $output .= '</table>';
        $output .= '</div>';
        $output .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>';
        $output .= '<script src="' . base_url . 'assets/js/boxes.js"></script>';
        echo $output;
    } else {
        echo '<h3><i class="far fa-sad-cry"></i> No se han encontrado graficos.</h3>';
    }
} else {
    echo '<h3><i class="far fa-sad-cry"></i> No se han encontrado graficos.</h3>';
}
