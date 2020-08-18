<?php

require_once "../config/db.php";
require_once "../config/parameters.php";
require_once "../helpers/utils.php";
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
                                    <table class="table table-striped xs-text">
                                            <tr>
                                                    <th>RUT</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Correo</th>
                                                    <th>Genero</th>
                                                    <th>Estado de cuenta</th>
                                                    <th>Verificado</th>
                                                    <th>Gestión</th>
                                            </tr>';
    while ($usu = mysqli_fetch_array($resultado)) {
        if ($usu['genero'] == 1) {
            $genero = "Femenino";
        } elseif ($usu['genero'] == 2) {
            $genero = "Masculino";
        } elseif ($usu['genero'] == 3) {
            $genero = "Sin especificar";
        }
        if ($usu['habilitado'] == 1) {
            $habilitado = "Habilitado";
        } else {
            $habilitado = "Deshabilitado";
        }
        if ($usu['verificado'] == 1) {
            $verificado = "<i class='fas fa-check color-verde'></i> Correo verificado";
        } else {
            $verificado = "<i class='fas fa-times color-rojo'></i> Correo aún no verificado <a href='".base_url.'usuario/enviarCodigoActivar&id='.$usu['id']."' class='btn btn-success xs-text' ><i class='fal fa-envelope'></i> Enviar codigo</a>";
        }
        $output .= '
                    <tr>
                            <td>' . $usu["rut"] . '</td>
                            <td>' . $usu["nombre"] . '</td>
                            <td>' . $usu["apellido"] . '</td>
                            <td>' . $usu["correo"] . '</td>
                            <td>' . $genero . '</td>
                            <td>' . $habilitado . '</td>
                            <td>' . $verificado . '</td>
                            <td>
                        <a href="#modal-modificar-usuario" data-toggle="modal" class="btn btn-success xs-text" style="width: 100%;" 
 id=' . $usu['id'] . ' rut=' . $usu['rut'] . ' nombre=' . $usu['nombre'] . ' apellido=' . $usu['apellido'] . ' correo=' . $usu['correo'] . ' genero=' . $usu['genero'] . ' habilitado=' . $usu['habilitado'] . ' >
                            <i class="fal fa-edit"></i> Modificar</a>
                            
                        <a href="#modal-eliminar" data-toggle="modal" ruta="usuario/delete&id=" id="' . $usu['id'] . '" nombre="' . utils::acortador($usu['nombre'] . ' ' . $usu['apellido'], 60) . '" tipo="' . $usu['tipo'] . '"class="btn btn-danger eliminar xs-text" 
                           style="margin-top: 5px; width: 100%;" >
                           <i class="fal fa-trash-alt"></i> Eliminar</a>
                            </td>
                    </tr>';
    }
    echo $output;
} else {
    echo '<h3><i class="far fa-sad-cry"></i> No hay resultados, intente otra busqueda.</h3>';
}
    