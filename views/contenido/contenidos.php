<?php ?>

<h2> Gestionar <b>Textos</b></h2>
<hr>

<div class="row">
    <p class="col-sm-9 estudios"> A continuación se encuentran los botones correspondientes a cada sección de la pagina principal, en la cual podrás editar los textos referentes a ellas.</p>
    
    <div class="col-sm-10 estudios" id="contenedor-nuestros-estudios">
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" data-tipo="Quienes Somos" data-texto="<?= utils::getTextoByTipoContenido('Quienes Somos') ?>">
            <i class="fas fa-edit"></i> Quienes somos</button>
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" data-tipo="Graficos destacados" data-texto="<?= utils::getTextoByTipoContenido('Graficos destacados') ?>">
            <i class="fas fa-edit"></i> Graficos destacados</button>
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" data-tipo="Data" data-texto="<?= utils::getTextoByTipoContenido('Data') ?>">
            <i class="fas fa-edit"></i> Data</button>
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" data-tipo="Estudios" data-texto="<?= utils::getTextoByTipoContenido('Estudios') ?>">
            <i class="fas fa-edit"></i> Estudios</button>
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" data-tipo="Chile en el mundo" data-texto="<?= utils::getTextoByTipoContenido('Chile en el mundo') ?>">
            <i class="fas fa-edit"></i> Chile en el mundo</button>
        <br><br>
    </div>
</div>
</div>
</div>
</div>
</div>
