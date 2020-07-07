<?php

require_once "../config/db.php";
require_once "../config/parameters.php";
require_once "../helpers/utils.php";
require_once "../models/Archivo.php";

$archivo_model = new Archivo();
$output = '';
if (isset($_POST["query"])) {
    $busqueda = $_POST['query'];
    $resultado = $archivo_model->search($busqueda);
} else {
    $resultado = $archivo_model->search('all');

}
if (mysqli_num_rows($resultado) > 0 && $resultado != null) {
    $output .= '<div class="table-responsive">
                                    <table class="table table-striped d-flex">
                                        <tr>
                                            <th scope="col" class="col-sm-1">#</th>
                                            <th scope="col" class="col-sm-3">Archivo</th>
                                            <th scope="col" class="col-sm-4">Enlace</th>
                                            <th scope="col" class="col-sm-4">Gestión</th>
                                        </tr>';
    while ($obj = mysqli_fetch_array($resultado)) {

        $output .= '
                    <tr>
                            <td class="col-sm-1">' . $obj["id"] . '</td>
                            <td class="col-sm-3"><a class="link-normal small" href="' . base_url . 'uploads/archivos/' . $obj['archivo'] . '" target="_blank">' . utils::acortador($obj['archivo'], 30) . '</a></td>
                            <td class="col-sm-4 break-text"> <span id="enlace'.$obj['id'].'"> ' . base_url . 'uploads/archivos/' . $obj['archivo'] . ' </span> </td>
                            <td class="col-sm-4">
                        <button data-clipboard-target="#enlace'.$obj['id'].'" class="btn btn-success w-100"> <i class="fas fa-copy"></i> Copiar</button>

                        <a href="#modal-eliminar" data-toggle="modal" ruta="contenido/deleteArchivo&id=" id=' . $obj['id'] . ' nombre="' . utils::acortador($obj['archivo'], 60) . '" tipo="Archivo" class="btn btn-danger eliminar w-100 mt-2">
                           <i class="fas fa-trash-alt"></i> Eliminar</a>
                            </td>
                    </tr>';
    }
    $output .= '</table></div>';
    echo $output;
} else {
    echo '<h3><i class="far fa-sad-cry"></i> No se han encontrado imagenes.</h3>';
}


