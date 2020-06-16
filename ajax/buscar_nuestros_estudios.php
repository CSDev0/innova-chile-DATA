<?php

require_once "../config/db.php";
require_once "../config/parameters.php";
require_once "../helpers/utils.php";
require_once "../models/Estudio.php";

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
                                    <table class="table table-striped"">
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
        if ($obj['tipo'] == "estudio") {
            $contador = $contador + 1;
            $output .= '
                    <tr>
                            <td>' . $obj["id"] . '</td>
                            <td><a class="link-normal small" href="' . base_url . 'estudio/view&id=' . $obj['id'] . '" target="_blank">' . utils::acortador($obj['nombre'], 60) . '</a></td>
                            <td>' . $obj["ano_estudio"] . '</td>
                            <td>' . utils::acortador($obj['archivo'], 30) . '</td>
                            <td>' . $obj['fecha_creacion'] . '</td>
                            <td>
                        <a href="#modal-modificar-estudio" data-toggle="modal" class="btn btn-success" style="width: 100%;" 
 id=' . $obj['id'] . ' nombre="' . $obj['nombre'] . '" descripcion="'.$obj['descripcion'].'" ano_estudio="' . $obj['ano_estudio'] . '" archivo="' . base_url."uploads/documentos/estudios/".$obj['archivo'] . '" fecha_creacion=' . $obj['fecha_creacion'] . ' >
                            <i class="fas fa-edit"></i> Modificar</a>
                            
                        <a href="#modal-eliminar" data-toggle="modal" data-tipo="Estudio" data-ruta="estudio/delete&id=" data-id=' . $obj['id'] . ' class="btn btn-danger eliminar" 
                           style="margin-top: 5px; width: 100%;" >
                           <i class="fas fa-trash-alt"></i> Eliminar</a>
                            </td>
                    </tr>';
        }
    }
    if ($contador == 0) {
        echo '<h3><i class="far fa-sad-cry"></i> No hay resultados, intente otra busqueda.</h3>';
    } else {
        $output .= '<script src="' . base_url . 'assets/js/modal-eliminar.js"></script>';
        $output .= '<script src="' . base_url . 'assets/js/boxes.js"></script>';
        echo $output;
    }
} else {
    echo '<h3><i class="far fa-sad-cry"></i> No hay resultados, intente otra busqueda.</h3>';
}
    