<?php

require_once "../config/db.php";
require_once "../config/parameters.php";
require_once "../models/Usuario.php";

$usuario = new Usuario();
$output = '';
if (isset($_POST["query"])) {
    $busqueda = $_POST['query'];
    $resultado = $usuario->buscar($busqueda);
} else {
    $resultado = $usuario->buscar('all');
}

if (mysqli_num_rows($resultado) > 0 && $resultado != null) {
    $output .= '<div class="table-responsive">
                                    <table class="table table-striped"">
                                            <tr>
                                                    <th>RUT</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Correo</th>
                                                    <th>Estado</th>
                                                    <th>Opciones</th>
                                            </tr>';
    while ($usu = mysqli_fetch_array($resultado)) {
        $output .= '
                    <tr>
                            <td>' . $usu["rut"] . '</td>
                            <td>' . $usu["nombre"] . '</td>
                            <td>' . $usu["apellido"] . '</td>
                            <td>' . $usu["correo"] . '</td>
                            <td>' . $usu["activado"] . '</td>
                            <td>
                        <a href='.base_url.'estudio/modificarEstudio&id='.$usu['id'].' class="btn btn-success" style="width: 100%;" >
                            <i class="fas fa-edit"></i> Editar</a>
                            
                        <a href="#modal-eliminar" data-toggle="modal" data-tipo="Usuario" data-ruta="usuario/delete&id=" data-id='.$usu['id'].' class="btn btn-danger eliminar" 
                           style="margin-top: 5px;width: 100%;" ><i class="fas fa-trash-alt"></i> Eliminar</a>
                            </td>
                    </tr>';
    }
    $output.='<script src="'. base_url.'assets/js/modal-eliminar.js"></script>';
    echo $output;
} else {
    echo '<h3><i class="far fa-sad-cry"></i> No hay resultados, intente otra busqueda.</h3>';
}