<?php 

?>
<h2> Gestionar <b>Estudios</b></h2><input data-size="s"type="checkbox" id="estudios-toggle" checked data-toggle="toggle" data-on="Nuestros estudios" data-off="Lecturas recomendadas" data-onstyle="nuestros" data-offstyle="recomendadas">

<hr>

<div class="row">

    <div class="col-sm-10 estudios" id="contenedor-nuestros-estudios">
        <h4>Nuestros estudios</h4>
        <button class="btn btn-primary" href="#modal-agregar-estudio" data-toggle="modal"><i class="fas fa-plus-square"></i> Agregar</button>
        <button class="btn btn-primary" href="#modal-buscar-estudio" data-toggle="modal"><i class="fas fa-search-plus"></i> Buscar</button>
        <br><br>
        <?php require_once('views/estudios/ver-nuestros-estudios.php');?>

    </div>
</div>
<div class="row">
    <div class="col-sm-10 lecturas" id="contenedor-lecturas-recomendadas">
        <h4>Lecturas recomendadas</h4>
        <button class="btn btn-primary" href="#modal-agregar-lectura" data-toggle="modal"><i class="fas fa-plus-square"></i> Agregar</button>
        <button class="btn btn-primary" href="#modal-agregar-lectura" data-toggle="modal"><i class="fas fa-search-plus"></i> Buscar</button>
        <br><br>
        <?php require_once('views/estudios/ver-lecturas-recomendadas.php');?>
    </div>
</div>
</div>
</div>
</div>
</div>