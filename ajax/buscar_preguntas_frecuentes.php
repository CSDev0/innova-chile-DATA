<?php
require_once "../config/db.php";
require_once "../helpers/utils.php";
require_once "../config/parameters.php";
require_once "../models/Contenido.php";
require_once '../models/Usuario.php';

$usuario = new Contenido();
$output = '';
if (isset($_POST["query"])) {
    $busqueda = $_POST['query'];
    $resultado = $usuario->searchPregunta($busqueda);
    ?><script>$("tbody").sortable("disable");</script><?php
} else {
    $resultado = $usuario->searchPregunta('all');
    ?>
    <script>
        $("tbody").sortable({
            handle: '.drag-icon',
            axis: 'y',
            update: function (event, ui) {
                var data = $(this).sortable('serialize');

    //         POST to server using $.post or $.ajax
                    $.ajax({
                        url: "../ajax/ordenar_preguntas.php",
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
                                    <table class="table table-striped xs-text">
                                            <tr>
                                                    <th>Ordenar</th>
                                                    <th>Pregunta</th>
                                                    <th>Respuesta</th>
                                                    <th>Ultima modificación</th>
                                                    <th>Gestión</th>
                                            </tr>
                                            <tbody>
';
        while ($obj = mysqli_fetch_array($resultado)) {
            $ultima_modificacion = utils::getTiempo($obj['ultima_modificacion']);
            $output .= '
                    
                    <tr id="pregunta-' . $obj['id'] . '">
                            <td><i class="fas fa-arrows-alt fa-lg drag-icon"></i></td>
                            <td>' . $obj["nombre"] . '</td>
                            <td>' . utils::acortador(htmlentities($obj["texto"]), 100) . '</td>
                            <td>' .$ultima_modificacion. '</td>
                            <td>
                        <a href="#modal-modificar-pregunta" data-toggle="modal" class="btn btn-success xs-text" style="width: 100%;" 
 id="' . $obj['id'] . '" pregunta="' . $obj['nombre'] . '" respuesta="' . htmlentities($obj['texto']) . '" ultima_modificacion="' . $ultima_modificacion . '" usuario_modificacion="' . utils::getUsuarioNombre($obj['Usuario_id']) . '">
                            <i class="fal fa-edit"></i> Modificar</a>
                            
                        <a href="#modal-eliminar" data-toggle="modal" ruta="contenido/deletePregunta&id=" id="' . $obj['id'] .'" nombre="' . utils::acortador($obj['nombre'], 60) .'" tipo="'.$obj['tipo'].'" class="btn btn-danger eliminar xs-text" 
                           style="margin-top: 5px; width: 100%;" >
                           <i class="fal fa-trash-alt"></i> Eliminar</a>
                            </td>
                    </tr>
                   ';
        }
        $output .= '</tbody>';
        $output .= '</table>';
        $output .= '</div>';
        echo $output;
    } else {
        echo '<h3><i class="far fa-sad-cry"></i> No se han encontrado preguntas.</h3>';
    }
} else {
    echo '<h3><i class="far fa-sad-cry"></i> No se han encontrado preguntas.</h3>';
}
    