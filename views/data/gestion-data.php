<?php

?>
<h2> Gestionar <b>Data</b></h2>
<hr>
<div class="row">
    <div class="col-sm-10 contenedor-gestion">
        <h3><b>Repositorio</b></h3>
        <p>Aquí podras modificar el repositorio de <b class="color-azul">Github</b> del cual provengan los <b class="color-azul">Graficos destacados</b>.</p>
        <button class="btn btn-primary m-text d-flex align-items-center" href="#modal-repositorio" data-toggle="modal" usuario="<?= $repo->usuario ?>"
                repositorio="<?= $repo->repositorio ?>" ultima_modificacion="<?= $repo->ultima_modificacion ?>" usuario_modificacion="<?= utils::getUsuarioNombre($repo->Usuario_id) ?>">
            <i class="fab fa-github fa-2x mr-2"></i>Gestionar repositorio</button>
        <br>
        <div class="col-sm bg-gris rounded p-2"> 
        <p >Una vez hayas guardado los datos del repositorio, debemos descargarlo y descomprimirlo para poder utilizar los graficos en la sección de Graficos destacados <br>
            <b class="color-rojo xs-text">Utiliza esta función para cuando se hayan realizado cambios en el repositorio o cuando se haya configurado un nuevo repositorio.</b></p>        
        <a class="btn btn-warning" href="<?=base_url.'data/downloadAndUnzip'?>"><i class="fas fa-exclamation-triangle"></i></i> Descargar el repositorio y descomprimir todo <i class="fas fa-exclamation-triangle"></i></a>
        </div>
        <?php if(file_exists('uploads/repo/'.$repo->repositorio.'-master')){
            echo '<p>Estos son los archivos actuales del repositorio descargado: <br>';
            require_once('views/data/ver-repositorio.php');
        }else{
            echo '<p>No hay repositorio descargado y descomprimido aún. <br>';
        }
        ?>
    </div>
    <div class="col-sm-10 contenedor-gestion">
        <h3><b>Graficos destacados</b></h3>
        <p>Aquí podras agregar, modificar y eliminar los graficos destacados de la sección <b class="color-azul">Graficos destacados</b>, para esto, primero se debe descargar el repositorio de <b class="color-azul">Github</b> que contiene los graficos.</p>

        <button class="btn btn-primary" href="#modal-agregar-data" data-toggle="modal"><i class="fas fa-plus-square"></i> Agregar</button>
        <button class="btn btn-primary" href="#modal-buscar-data" data-toggle="modal"><i class="fas fa-search-plus"></i> Buscar</button>
        <br><br>
        <?php require_once('views/data/ver-graficos-destacados.php'); ?>

    </div>
    <div class="col-sm-10 contenedor-gestion">
        <h3><b>Datos destacados</b></h3>
        <p>Aquí podras modificar las variables ubicadas en <b class="color-azul">Datos destacados</b>.</p>

        <button class="btn btn-primary" href="#modal-agregar-data" data-toggle="modal"><i class="fas fa-dollar-sign fa-1x"></i> Millones</button>
        <button class="btn btn-primary" href="#modal-buscar-data" data-toggle="modal"><i class="fas fa-chart-line fa-1x"></i> Iniciativas apoyadas</button>
        <button class="btn btn-primary" href="#modal-buscar-data" data-toggle="modal"><i class="fas fa-globe fa-1x"></i> Beneficiados</button>
        <br><br>
        <?php require_once('views/data/ver-graficos-destacados.php'); ?>

    </div>
</div>

</div>
</div>
</div>
</div>
