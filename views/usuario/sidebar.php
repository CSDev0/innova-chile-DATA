<?php
$nombre_completo = utils::getNombreCompleto();
?>
<div class="row">
    <div class="col-sm-2">
        <div class="" style="margin-left:10%; padding-left: 5%; padding-top:10% ;padding-bottom: 500%;background-color:#F58457;">
            <h2 class='panel-nombre'><a href="<?= base_url ?>usuario/panel"><?= $nombre_completo ?></a></h2>
            <?php
            if ($_SESSION['tipo_usuario'] == 'admin') {
                ?>
                <div class="" style="margin-bottom:10px;">
                    <button class="btn btn-primary panel" onclick='window.location.href = "<?= base_url ?>gestion/usuarios"'>Gestionar usuarios</button>
                </div>
                <?php
            }
            ?>
            <div class="" style="margin-bottom:10px;">
                <button class="btn btn-primary panel" onclick='window.location.href = "<?= base_url ?>gestion/estudios"'>Gestionar estudios</button>
            </div>
            <div class="" style="margin-bottom:10px;">
                <button class="btn btn-primary panel" onclick='window.location.href = "<?= base_url ?>gestion/textos"'>Gestionar textos</button>
            </div>
        </div>
    </div>
    <div class="col-sm-10">
        <div class="" style=" padding-top:2% ;padding-bottom: 20%;">

