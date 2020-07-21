<?php

require_once "../config/db.php";
require_once "../config/parameters.php";
require_once "../helpers/utils.php";
require_once "../models/Convocatoria.php";

$convocatoria = new Convocatoria();
$output = '';
if (isset($_POST["query"])) {
    $busqueda = $_POST['query'];
    $resultado = $convocatoria->search($busqueda);
} else {
    $resultado = $convocatoria->search('all');
}

if($resultado){
  if (mysqli_num_rows($resultado) > 0 && $resultado != null) {
      $output .= '<div class="table-responsive">
                                      <table class="table table-striped"">
                                          <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Archivo</th>
                                              <th scope="col">Año</th>
                                              <th scope="col">LLamado</th>
                                              <th scope="col">Gestión</th>
                                          </tr>';
      $contador = 0;
      while ($obj = mysqli_fetch_array($resultado)) {
          $archivo = substr($obj['archivo'], strrpos($obj['archivo'], '/') + 1);
          if ($obj['tipo'] == "estudio") {
              $contador = $contador + 1;
              $output .= '
                      <tr>
                              <td>' . $obj["id"] . '</td>
                              <td><a class="link-normal small" href="' . base_url . $obj['archivo'] . '" target="_blank">' . $archivo . '</a></td>
                              <td>' . $obj["año"] . '</td>
                              <td>' . utils::acortador($obj['archivo'], 30) . '</td>
                              <td>
                                <a href="#modal-eliminar" data-toggle="modal" ruta="convocatoria/delete&id=" id=' . $obj['id'] . ' nombre="' . utils::acortador($obj['nombre'], 60) .'" tipo="'.$obj['tipo'].'" class="btn btn-danger eliminar" style="margin-top: 5px; width: 100%;" >
                                  <i class="fas fa-trash-alt"></i> Eliminar
                                </a>
                              </td>
                      </tr>';
          }
      }
      if ($contador == 0) {
          echo '<h3><i class="far fa-sad-cry"></i> No hay resultados, intente otra busqueda.</h3>';
      } else {
          $output .= '<script src="' . base_url . 'assets/js/boxes.js"></script>';
          echo $output;
      }
  } else {
      echo '<h3><i class="far fa-sad-cry"></i> No hay resultados, intente otra busqueda.</h3>';
  }
} else {
    echo '<h3><i class="far fa-sad-cry"></i> No hay convocatorias, porfavor intente mas tarde.</h3>';
}
