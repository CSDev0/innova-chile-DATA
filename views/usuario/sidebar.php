<?php
$nombre_completo = utils::getNombreCompleto();
?>
<div class="row">
    <div class="col-sm-2">
        <div class="side-bar">
            <h2 class='panel-nombre'><a href="<?= base_url ?>usuario/panel"><?= $nombre_completo ?></a></h2>
            <?php
            if ($_SESSION['tipo_usuario'] == 'admin') {
                ?>
                <div class="" style="margin-bottom:10px;">
                    <button class="btn btn-primary panel" onclick='window.location.href = "<?= base_url ?>gestion/usuarios"'><i class="fas fa-users"></i> Gestión usuarios</button>
                </div>
                <?php
            }
            ?>
            <div class="" style="margin-bottom:10px;">
                <button class="btn btn-primary panel" onclick='window.location.href = "<?= base_url ?>gestion/estudios"'><i class="fas fa-file-alt"></i> Gestión estudios</button>
            </div>
            <div class="" style="margin-bottom:10px;">
                <button class="btn btn-primary panel" onclick='window.location.href = "<?= base_url ?>gestion/textos"'><i class="fas fa-align-left"></i> Gestión textos</button>
            </div>
            <div class="" style="margin-bottom:10px;">
                <button class="btn btn-danger panel" onclick='window.location.href = "<?= base_url ?>usuario/logout"'><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</button>
            </div>
        </div>
    </div>
    <div class="col-sm-10">
        <div class="" style=" padding-top:2% ;padding-bottom: 20%;">

