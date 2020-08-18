<?php

require_once "../../config/db.php";
require_once "../../config/parameters.php";
require_once "../../helpers/utils.php";
require_once "../../models/Estudio.php";
require_once '../../models/Usuario.php';

$estudio = new Estudio();
$output = '';
if (isset($_POST["query"])) {
    $busqueda = $_POST['query'];
    $resultado = $estudio->search($busqueda);
} else {
    $resultado = $estudio->search('all');
}

if (mysqli_num_rows($resultado) > 0 && $resultado != null) {
    $output .= '<div class="table-responsive">
                                    <table class="table table-striped xs-text">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Año</th>
                                            <th scope="col">Archivo</th>
                                            <th scope="col">Ultima edición</th>
                                            <th scope="col">Gestión</th>
                                        </tr>';
    $contador = 0;
    while ($obj = mysqli_fetch_array($resultado)) {
        if ($obj['tipo'] == "programa") {
            $ultima_modificacion = utils::getTiempo($obj['ultima_modificacion']);
            $contador = $contador + 1;
            $output .= '
                    <tr>
                            <td>' . $obj["id"] . '</td>
                            <td><a class="link-normal small" href="' . base_url . 'estudio/view&id=' . $obj['id'] . '" target="_blank">' . utils::acortador($obj['nombre'], 60) . '</a></td>
                            <td>' . $obj["ano_estudio"] . '</td>
                            <td>' . utils::acortador($obj['archivo'], 30) . '</td>
                            <td>' . $ultima_modificacion. '</td>
                            <td>
                        <a href="#modal-modificar-programa" data-toggle="modal" class="btn btn-success xs-text w-100"
 id=' . $obj['id'] . ' nombre="' . $obj['nombre'] . '" descripcion="' . htmlentities($obj['descripcion']) . '" ano_estudio="' . $obj['ano_estudio'] . '" archivo="' . $obj['archivo'] . '" ultima_modificacion="'.$ultima_modificacion . '" usuario_modificacion="' . utils::getUsuarioNombre($obj['Usuario_id']) . '" >

                            <i class="fal fa-edit"></i> Modificar</a>

                        <a href="#modal-eliminar" data-toggle="modal" ruta="estudio/delete&id=" id=' . $obj['id'] . ' nombre="' . utils::acortador($obj['nombre'], 60) .'" tipo="'.$obj['tipo'].'" class="btn btn-danger eliminar xs-text mt-1 w-100">
                           <i class="fal fa-trash-alt"></i> Eliminar</a>
                            </td>
                    </tr>';
        }
    }
    if ($contador == 0) {
        echo '<h3><i class="far fa-sad-cry"></i> No se han encontrado programas.</h3>';
    } else {
        echo $output;
    }
} else {
    echo '<h3><i class="far fa-sad-cry"></i> No se han encontrado programas.</h3>';
}
