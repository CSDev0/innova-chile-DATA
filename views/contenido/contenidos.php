<?php 
$qui = 'Quienes somos';
$des = 'Datos destacados';
$dat = 'Data';
$est = 'Estudios';
$chi = 'Chile en el mundo'
?>

<h2> Gestionar <b>Textos</b></h2>
<hr>

<div class="row">
    <p class="col-sm-9 estudios"> A continuación se encuentran los botones correspondientes a cada sección de la pagina principal, en la cual podrás editar los textos referentes a ellas.</p>
    
    <div class="col-sm-10 estudios" id="contenedor-nuestros-estudios">
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" data-tipo="<?=$qui?>" data-texto='<?= utils::getTextoByTipoContenido($qui) ?>' data-usuario='<?=utils::getUsuarioByTipoContenido($qui)?>' data-fecha="<?=utils::getFechaByTipo($qui)?>">
            <i class="fas fa-edit"></i> Quienes somos</button>
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" data-tipo="<?=$des?>" data-texto='<?= utils::getTextoByTipoContenido($des) ?>' data-usuario='<?=utils::getUsuarioByTipoContenido($des)?>' data-fecha="<?=utils::getFechaByTipo($des)?>">
            <i class="fas fa-edit"></i> Datos destacados</button>
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" data-tipo="<?=$dat?>" data-texto='<?= utils::getTextoByTipoContenido($dat) ?>' data-usuario='<?=utils::getUsuarioByTipoContenido($dat)?>' data-fecha="<?=utils::getFechaByTipo($dat)?>">
            <i class="fas fa-edit"></i> Data</button>
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" data-tipo="<?=$est?>" data-texto='<?= utils::getTextoByTipoContenido($est) ?>' data-usuario='<?=utils::getUsuarioByTipoContenido($est)?>' data-fecha="<?=utils::getFechaByTipo($est)?>">
            <i class="fas fa-edit"></i> Estudios</button>
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" data-tipo="<?=$chi?>" data-texto='<?= utils::getTextoByTipoContenido($chi) ?>' data-usuario='<?=utils::getUsuarioByTipoContenido($chi)?>' data-fecha="<?=utils::getFechaByTipo($chi)?>">
            <i class="fas fa-edit"></i> Chile en el mundo</button>
        <br><br>
    </div>
</div>
</div>
</div>
</div>
</div>
